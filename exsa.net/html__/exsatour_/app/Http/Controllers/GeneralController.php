<?php

namespace Exsatour\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use \Exsatour\Usuario;
use SimpleSoftwareIO\QrCode\BaconQrCodeGenerator;
use Barryvdh\DomPDF\PDF;
use DateTime;
class GeneralController extends Controller
{
  // Mostrar la vista del formulario
  public function index()
  {
    return view('inscripcion', ['bcrypt'=>NULL, 'duplicado'=>FALSE]);
  }

  //Guardar el registro
  public function store(Request $request)
  {
    $usuario = Usuario::where(['dni'=> $request->input('dni') ])->first();

    if($usuario){
      return view('inscripcion', ['bcrypt'=> NULL, 'duplicado' =>TRUE]);
    }else{
      $fecha = new DateTime();
      $bcrypt = rand(100000, 999999).$fecha->getTimestamp();

      $qrcode = new BaconQrCodeGenerator;

      $urlQRCode = url('/active/'.$bcrypt);
      $qrcode->format('png')->size(250)->errorCorrection('H')->encoding('UTF-8')->generate( $urlQRCode, 'public/boarding-pass/'.$bcrypt.'.png' );
      
      $data = [
        'nombres' => $request->input('nombres'),
        'apellidos' => $request->input('apellidos'),
        'dni' => $request->input('dni'),
        'ciudad' => $request->input('ciudad'),
        'celular' => $request->input('celular'),
        'email' => $request->input('email'),
        'bcrypt' => $bcrypt,
        'estado' => 0
      ];
      Usuario::create( $data );
      $this->generate_boarding($data);
      $this->generate_pdf($bcrypt);
      

      $this->email = $request->input('email');
      $this->bcrypt = $bcrypt;



      Mail::send('emails.email', ['nombres'=>$request->input('nombres'), 'apellidos'=>$request->input('apellidos')], function($msj){
        $msj->subject('Boarding Pass - Exsatour');
        $msj->to($this->email);
        $msj->attach('public/boarding-pass/'.$this->bcrypt.'.pdf');
      });

      

      return view('inscripcion', ['bcrypt'=> $bcrypt, 'duplicado' =>FALSE, 'email'=> $request->input('email'), 'urlQRCode'=>$urlQRCode]);
    }
  }

  // Activar un usuario a ingresado
  public function activar( $bcrypt )
  {
    $usuario = Usuario::where(['bcrypt'=> $bcrypt ])->first();
    if($usuario){
      if( $usuario->estado == 0 ){
        $usuario = Usuario::where(['bcrypt'=> $bcrypt])
                  ->update( ['estado' => 1 ] );
        return 'Invitado registrado';
      }else if( $usuario->estado == 1 ){
        return 'Invitado ya ingresó anteriormente';
      }
    }else{
      return 'No existe usuario';
    }
  }

  // Listar los usuarios registrados
  public function lista()
  {
    $lista = Usuario::all();
    return view('lista', ['listUsuarios'=>$lista]);
  }


  public function generate_pdf($bcrypt)
  {
    $view = \View::make('pdf.boarding-pass', ['bcrypt'=>$bcrypt])->render();
    $pdf = \App::make('dompdf.wrapper');
    $pdf->loadHTML($view)->save('public/boarding-pass/'.$bcrypt.'.pdf');
    return true;
  }

  public function generate_boarding($data)
  {
    header("Content-type: image/jpeg");
    $im     = imagecreatefromjpeg("public/images/boarding-pass-2.jpg");
    $black = imagecolorallocate($im, 0, 0, 0);
    $fuente = '/public/fonts/coolveticarg.ttf';
    $size = 30;
    // Nombres
    $x = 810; 
    $y = 420;
    imagettftext($im, $size, 0, $x, $y, $black, $fuente, $data['nombres']);

    // Apellidos
    $x = 1215;
    imagettftext($im, $size, 0, $x, $y, $black, $fuente, $data['apellidos']);

    // DNI
    $x = 1635;
    imagettftext($im, $size, 0, $x, $y, $black, $fuente, $data['dni']);

    // --------
    // Ciudad
    $x = 810;
    $y = 570;
    imagettftext($im, $size, 0, $x, $y, $black, $fuente, $data['ciudad']);

    // Celular
    $x = 1215;
    $y = 570;
    imagettftext($im, $size, 0, $x, $y, $black, $fuente, $data['celular']);

    // Email
    $x = 1635;
    $y = 570;
    imagettftext($im, $size, 0, $x, $y, $black, $fuente, $data['email']);

    // imagejpeg($im);
    // imagedestroy($im);


    // Imagen a superponer
    $arriba = imagecreatefrompng("public/boarding-pass/".$data['bcrypt'].'.png' );
     
    // Superponemos imagenes
    imagecopy( $im, $arriba, 1620, 600, 0, 0, 250, 250 );
     
    // mostramos la imagen
    imagejpeg( $im , 'public/boarding-pass/'.$data['bcrypt'].'.jpg'  );
     
    // Liberamos memoria
    imagedestroy( $im );
    imagedestroy( $arriba );

    return true;
  }

}
