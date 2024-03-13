<?php
//ini_set('max_execution_time', 6000);

require_once(INCDIR.'uc_functions.php');
require_once(INCDIR.'ez_sql/ez_sql_core.php');
require_once(INCDIR.'ez_sql/ez_sql_mysql.php');
require_once(INCDIR.'swiftmailer/swift_required.php');
require_once(INCDIR.'phpexcel/PHPExcel.php');
require_once(INCDIR.'fpdf/fpdf.php');
class Service
{
    private $db;
    private $log;
    private $excels_dir;
    private $campoLink;
    private $pub;

    function __construct() 
    {
        $GLOBALS['amfphp']['encoding'] = 'amf3';
        $this->db = new ezSQL_mysql(DB_USER,DB_PASS,DB_NAME,DB_HOST);
        
        if(PRODUCTION_SERVER) $this->db->hide_errors();
        $this->excels_dir = PHPDIR.'../excels' ;


        $this->pub=true;
        if($this->pub){
            $this->campoLink = 'url1';
        }else{
            $this->campoLink = 'url2';
        }
    }    

    private function codificarPalabra($label){
        return mb_check_encoding ( $label ,  'UTF-8' )  ? $label : utf8_encode ( $label);
    }
    
    private function cerosIzquierda($n,$l){
        $retorno= str_pad($n, $l, "0", STR_PAD_LEFT);
        return $retorno;
    }
    private function guardarExcel( $objPHPExcel, $name )
    {
        $objPHPExcel->setActiveSheetIndex(0);       
        date_default_timezone_set('America/Lima');
        $fecha = new DateTime();
        $llave = $fecha->getTimestamp();
        $filename = $name . "_".$llave.".xls";        
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $carpeta=$this->excels_dir."/".$fecha->format("Y-m-d");
        if(!file_exists($carpeta)){
            mkdir($carpeta);
        }
        $objWriter->save( $carpeta . "/" . $filename );    
        return $filename;
    }
    private function cabezerasExcel($title,$descripcion='',$keywords='',$category='')
    {        
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setCreator("registro de horas de trabajo")
                                     ->setTitle($title)
                                     ->setSubject($title)
                                     ->setDescription($descripcion)
                                     ->setKeywords($keywords)
                                     ->setCategory($category);
        return $objPHPExcel;
    }
//CLASES GENERALES
    private function guardarImagen($imagen,$directorio,$nombre){
        $Base64Img=$imagen;
        //eliminamos data:image/png; y base64, de la cadena que tenemos
        //hay otras formas de hacerlo                   
        list(, $Base64Img) = explode(';', $Base64Img);
        list(, $Base64Img) = explode(',', $Base64Img);        
        //Decodificamos $Base64Img codificada en base64.
        $Base64Img = base64_decode($Base64Img);
        //return $Base64Img;
        //escribimos la información obtenida en un archivo llamado 
        //unodepiera.png para que se cree la imagen correctamente
        $ruta=$directorio.$nombre;     
        file_put_contents($ruta, $Base64Img);
    }
    private function sanear_string($string)
    {

        $string = trim($string);

        $string = str_replace(
            array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
            array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
            $string
        );

        $string = str_replace(
            array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
            array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
            $string
        );

        $string = str_replace(
            array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
            array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
            $string
        );

        $string = str_replace(
            array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
            array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
            $string
        );

        $string = str_replace(
            array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
            array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
            $string
        );

        $string = str_replace(
            array('ñ', 'Ñ', 'ç', 'Ç'),
            array('n', 'N', 'c', 'C',),
            $string
        );

        //Esta parte se encarga de eliminar cualquier caracter extraño
        $string = str_replace(
            array("\\", "¨", "º", "°", "~",
                 "#", "@", "|", "!", "\"",
                 "$", "%", "&", "/",".",
                 "(", ")", "?", "'", "¡",
                 "¿", "[", "^", "`", "]",
                 "+", "}", "{", "¨", "´",
                 ">", "< ", ";", ",", ":",
                  " "),
            '',
            $string
        );


        return $string;
    }
    /**
        CLASES PARA EL ADMINISTRADOR
    **/
    /*
    public function getMenu()
    {
        $sql="SELECT idMenu,descripcion,$this->campoLink AS url,url1 AS guiaLink FROM menu WHERE main=1 AND estado=1";
        $main=$this->db->get_results($sql);
        $idMenu=$main[0]->idMenu;
        $nombreMenu=$this->codificarPalabra($main[0]->descripcion);
        $url=$main[0]->url;
        $guiaLink=$main[0]->guiaLink;
        $sqlItem="SELECT idItemMenu,descripcion,$this->campoLink AS url,url1 AS guiaLink FROM item_menu WHERE idMenu=$idMenu AND tipo=0 AND estado=1 ORDER BY orden";
        $items=$this->db->get_results($sqlItem);
        $lvl1 = array();
        foreach ($items as $item) 
        {         
            $menuLvl1 = new stdClass();   
            $idItemMenu=$item->idItemMenu;
            $menuLvl1->idItemMenu=$idItemMenu;            
            $menuLvl1->descripcion=$this->codificarPalabra($item->descripcion);
            $menuLvl1->url=$item->url;
            $menuLvl1->guiaLink=$item->guiaLink;
                $sqlMenuLvl2="SELECT idMenu FROM menu_has_item_menu WHERE idItemMenu=$idItemMenu AND estado=1";
                $idMenuLvl2=$this->db->get_var($sqlMenuLvl2);
                if($idMenuLvl2 != null){
                    $sqlItemLvl2="SELECT idItemMenu,descripcion,$this->campoLink AS url,url1 AS guiaLink FROM item_menu WHERE idMenu=$idMenuLvl2 AND tipo=1 AND estado=1 ORDER BY orden";                    
                    $itemsLvl2=$this->db->get_results($sqlItemLvl2);
                    $lvl2 = array();
                    foreach ($itemsLvl2 as $itemlVL2) 
                    {         
                        $menuLvl2 = new stdClass();   
                        $idItemMenuLvl2=$itemlVL2->idItemMenu;
                        $menuLvl2->idItemMenu=$idItemMenuLvl2;            
                        $menuLvl2->descripcion=$this->codificarPalabra($itemlVL2->descripcion);
                        $menuLvl2->url=$itemlVL2->url;
                        $menuLvl2->guiaLink=$itemlVL2->guiaLink;
                            $sqlMenuLvl3="SELECT idMenu FROM menu_has_item_menu WHERE idItemMenu=$idItemMenuLvl2 AND estado=1";                            
                            $idMenuLvl3=$this->db->get_var($sqlMenuLvl3);
                            if($idMenuLvl3 != null){
                                $sqlItemLvl3="SELECT idItemMenu,descripcion,$this->campoLink AS url,url1 AS guiaLink FROM item_menu WHERE idMenu=$idMenuLvl3 AND tipo=1 AND estado=1 ORDER BY orden";                        
                                $itemsLvl3=$this->db->get_results($sqlItemLvl3);
                                $lvl3 = array();
                                foreach ($itemsLvl3 as $itemlVL3) 
                                {         
                                    $menuLvl3 = new stdClass();   
                                    $idItemMenuLvl3=$itemlVL3->idItemMenu;
                                    $menuLvl3->idItemMenu=$idItemMenuLvl3;            
                                    $menuLvl3->descripcion=$this->codificarPalabra($itemlVL3->descripcion);
                                    $menuLvl3->url=$itemlVL3->url;
                                    $menuLvl3->guiaLink=$itemlVL3->guiaLink;
                                        $sqlMenuLvl4="SELECT idMenu FROM menu_has_item_menu WHERE idItemMenu=$idItemMenuLvl3 AND estado=1";
                                        $idMenuLvl4=$this->db->get_var($sqlMenuLvl4);
                                        if($idMenuLvl4 != null){                                            
                                            $sqlItemLvl4="SELECT idItemMenu,descripcion,$this->campoLink AS url,url1 AS guiaLink FROM item_menu WHERE idMenu=$idMenuLvl4 AND tipo=1 AND estado=1 ORDER BY orden";
                                            $itemsLvl4=$this->db->get_results($sqlItemLvl4);                                           
                                        }else{
                                            $itemsLvl4=null;
                                        }
                                    $menuLvl3->hijos=$itemsLvl4;
                                    $lvl3[]=$menuLvl3;
                                }                                
                            }else{
                                $lvl3=null;
                            }
                        $menuLvl2->hijos=$lvl3;
                        $lvl2[]=$menuLvl2;
                    }
                }else{
                    $lvl2=null;
                }
            $menuLvl1->hijos=$lvl2;
            $lvl1[]=$menuLvl1;
        }
        $menu = new stdClass();
        $menu->id=$idMenu;
        $menu->nombre=$nombreMenu;
        $menu->url=$url;
        $menu->guiaLink->$guiaLink;
        $menu->items=$lvl1;
        return $menu;
    }
    public function getContenido($data)
    {
        $seccion=json_decode($data);
        //$seccion='peru';
        $sqlItem="SELECT idItemMenu FROM item_menu WHERE url1='$seccion' AND estado=1";
        $idItemMenu=$this->db->get_var($sqlItem);
        $sql="SELECT i.idPagina FROM item_menu_pagina i JOIN pagina p ON i.idPagina=p.idPagina WHERE i.idItemMenu=$idItemMenu AND p.estado=1";
        $idPagina=$this->db->get_var($sql);
        $sqlPag="SELECT titulo FROM pagina WHERE idPagina=$idPagina AND estado=1";
        $titulo=$this->db->get_var($sqlPag);
        $sqlContenidos="SELECT idContenido FROM pagina_has_contenido WHERE idPagina=$idPagina ORDER BY orden";
        $idContenidos=$this->db->get_results($sqlContenidos);
        $datos = array();
        foreach ($idContenidos as $idCont) 
        {
            $data = new stdClass();
            $idContenido=$idCont->idContenido;
            $sqlContenido="SELECT idContenido,titulo,subTitulo,texto FROM contenido WHERE idContenido=$idContenido AND estado=1";
            $res=$this->db->get_results($sqlContenido);
            $data->idContenido=$res[0]->idContenido;
            $data->titulo=$res[0]->titulo;
            $data->subTitulo=$res[0]->subTitulo;
            $data->texto=$res[0]->texto;
            $sqlIdImagenes="SELECT idImagen FROM imagenes_contenidos WHERE idContenido=$idContenido";
            $idImagenes=$this->db->get_results($sqlIdImagenes);
            if($idImagenes != null){
                $imagenes = array();
                foreach ($idImagenes as $idsImg)
                {
                    $img=new stdClass();
                    $idImagen=$idsImg->idImagen;
                    $sqlImagen="SELECT idImagen,title,url,alt FROM imagenes WHERE idImagen=$idImagen AND estado=1";
                    $resImg=$this->db->get_results($sqlImagen);
                    $img->idImagen=$resImg[0]->idImagen;
                    $img->title=$resImg[0]->title;
                    $img->url=$resImg[0]->url;
                    $img->alt=$resImg[0]->alt;
                    $imagenes[]=$img;
                }
            }else{
                $imagenes=null;
            }
            $sqlIdArchivos="SELECT idArchivo FROM contenido_archivos WHERE idContenido=$idContenido";
            $idArchivos=$this->db->get_results($sqlIdArchivos);
            if($idArchivos != null){
                $archivos = array();
                foreach ($idArchivos as $idsFile)
                {
                    $file=new stdClass();
                    $idArchivo=$idsFile->idArchivo;
                    $sqlFile="SELECT nombre,ruta FROM archivos WHERE idArchivo=$idArchivo AND estado=1";
                    $resFile=$this->db->get_results($sqlFile);
                    $file->nombre=$resFile[0]->nombre;
                    $file->ruta=$resFile[0]->ruta;
                    $archivos[]=$file;
                }
            }else{
                $archivos=null;
            }
            $sqlIdTabs="SELECT idTab FROM contenido_has_tabs WHERE idContenido=$idContenido";
            $idTabs=$this->db->get_results($sqlIdTabs);
            if($idTabs != null){
                $tabs = array();
                foreach ($idTabs as $idsTabs)
                {
                    $tab=new stdClass();
                    $idTab=$idsTabs->idTab;
                    $sqlTab="SELECT idTab,id,class FROM tabs WHERE idTab=$idTab AND estado=1";
                    $resTab=$this->db->get_results($sqlTab);
                    $tab->idTab=$resTab[0]->idTab;
                    $tab->id=$resTab[0]->id;
                    $tab->class=$resTab[0]->class;
                    $sqlPaneles="SELECT nombre,contenido FROM panel_tab WHERE idTab=$idTab AND estado=1 ORDER BY orden";
                    $paneles=$this->db->get_results($sqlPaneles);
                    $tab->paneles=$paneles;
                    $tabs[]=$tab;
                }
            }else{
                $tabs=null;
            }

            $sqlIdFormulario="SELECT c.idFormulario FROM contenido_formulario c JOIN formularios f ON c.idFormulario=f.idFormulario WHERE c.idContenido=$idContenido AND f.estado=1";
            $idFormulario=$this->db->get_var($sqlIdFormulario);
            if($idFormulario != null){
                $sqlFormulario="SELECT idFormulario,descripcion,claseFormulario FROM formularios WHERE idFormulario=$idFormulario AND estado=1";
                $resForm=$this->db->get_results($sqlFormulario);
                $formulario=new stdClass();
                $formulario->idFormulario=$resForm[0]->idFormulario;
                $formulario->descripcion=$resForm[0]->descripcion;
                $formulario->clase=$resForm[0]->claseFormulario;
                $sqlCampos="SELECT c.idCampoFormulario,c.nombre,c.idCampo,e.type AS claseCampo,c.placeholder,c.longitud FROM campos_formulario c JOIN elementos_formulario e ON c.idElementoFormulario=e.idElementoFormulario WHERE c.idFormulario=$idFormulario AND c.estado=1 ORDER BY c.orden";
                $camposForm=$this->db->get_results($sqlCampos);
                $campos = array();
                foreach ($camposForm as $camposF)
                {
                    $itemCampo=new stdClass();
                    $idCampoFormulario=$camposF->idCampoFormulario;
                    $itemCampo->idCampoFormulario=$idCampoFormulario;
                    $itemCampo->nombre=$camposF->nombre;
                    $itemCampo->idCampo=$camposF->idCampo;
                    $itemCampo->claseCampo=$camposF->claseCampo;
                    $itemCampo->placeholder=$camposF->placeholder;
                    $itemCampo->longitud=$camposF->longitud;
                    $sqlValoresSelect="SELECT valor,texto FROM valores_select WHERE idCampoFormulario=$idCampoFormulario ORDER BY texto";
                    $valoresSelect=$this->db->get_results($sqlValoresSelect);
                    $itemCampo->valores=$valoresSelect;
                    $campos[]=$itemCampo;
                }
                $formulario->campos=$campos;
            }else{
                $formulario=null;
            }

            $data->imagenes=$imagenes;
            $data->archivos=$archivos;
            $data->tabs=$tabs;
            $data->formulario=$formulario;
            $datos[]=$data;
        }
        $sqlImgSecciones="SELECT idMenu FROM menu_has_item_menu WHERE idItemMenu=$idItemMenu AND estado=1";
        $idMenu=$this->db->get_var($sqlImgSecciones);
        $sqlImg="SELECT idItemMenu,descripcion,$this->campoLink AS url,imagen FROM item_menu WHERE idMenu=$idMenu AND tipo=1 AND estado=1 ORDER BY orden";
        $resImgSecciones=$this->db->get_results($sqlImg);

        $pagina=new stdClass();
        $pagina->titulo=$titulo;
        $pagina->contenidos=$datos;
        $pagina->imagenesMenu=$resImgSecciones;
        return $pagina;
    }
    public function enviarCorreo($data)
    {
        $data=json_decode($data);
        $valores=$data->data;
        $nombres=$data->nombres;
        $cantidad=count($valores);
        
        date_default_timezone_set('America/Lima');
        $lpd_mail = "web";
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
        $headers .= "From: Exsa Web <$lpd_mail>\r\n";
        $headers .= "Reply-To: $lpd_mail\r\n";
        $message = '<html>
                    <head>
                        <meta charset="UTF-8">
                        <style type="text/css">td img {display: block;}
                            body{
                                font-family: verdana;
                                font-size:50px;
                            }
                            .etiqueta{
                                font-family: verdana;
                                font-size:15px;
                                font-weight:bold;
                                color:#FFF;
                            }
                            .valor{
                                font-family: verdana;
                                font-size:18px;
                                color:#0072bc;
                            }
                            h2{
                                color:#0072bc;
                            }
                        </style>
                        <title>Contacto</title>
                    </head>
                    <body style=" font-family: "courier";">
                        <div id="container" style="margin: 0 10%; width: 80%;">
                            <div id="imagen" style="text-align: center;">
                                <img src="http://exsa.net/wp-content/themes/greenearth/images/logoexsa.gif" width="200px">
                            </div>
                            <div id="contenido" style="background: #ffffff; border-radius: 5px; color: #ffffff; padding: 30px;">
                                <h2 style="color::#0072bc;">Nuevo Mensaje recibido</h2>
                                <table width="100%" border="0" cellspacing="5" cellpadding="1">';
                    for($i=0;$i<$cantidad;$i++){
                        $message.=' <tr>
                                        <td height="40" align="center" bgcolor="#0072bc" class="etiqueta">'.strtoupper($nombres[$i]).'</td>
                                        <td colspan="2" class="valor">'.strtoupper($valores[$i]).'</td>
                                    </tr>';
                    }                       
                    $message.=' </table>
                            </div>
                            <div id="footer" style="background: #0072bc; color: #ffffff; text-align: center;">
                                <p>Exsa</p>
                            </div>
                        </div>
                    </body>
                    </html>';
        $resultado=mail('segundocardom@gmail.com',"Formulario web - Exsa",$message,$headers);
        if($resultado){
            return 1;
        }else{
            return 0;
        }
    }
    public function utf(){
        $codificado=$this->codificarPalabra('á é í ó ú Á É Í Ó Ú °');
        $sql="INSERT INTO archivos (nombre,ruta,tamano,tipo,idUsuario) VALUES ('$codificado','ASDASD','1','1',1)";
        $this->db->query($sql);
    }
    //
    public function getMenuMin()
    {
        $sql="SELECT idMenu,descripcion FROM menu WHERE estado=1";
        $res=$this->db->get_results($sql);
        return $res;
    }
    public function getItemMenuMin()
    {
        $sql="SELECT idItemMenu,descripcion FROM item_menu WHERE estado=1 AND tipo != 0";
        $res=$this->db->get_results($sql);
        return $res;
    }
    public function getPaginaMin()
    {
        $sql="SELECT idPagina,titulo FROM pagina WHERE estado=1";
        $res=$this->db->get_results($sql);
        return $res;
    }
    //CLASE PARA ELIMINAR
    public function eliminar($data){
        $data=json_decode($data);
        $campo=$data->campo;
        $tabla=$data->tabla;
        $id=$data->id;
        $sql="UPDATE $tabla SET estado=0 WHERE $campo=$id";
        $res=$this->db->query($sql);
        if($res){
            return $tabla;
        }else{
            return 0;
        }
    }
    //CLASE PARA RECUPERAR
    public function recuperar($data){
        $data=json_decode($data);
        $campo=$data->campo;
        $tabla=$data->tabla;
        $id=$data->id;
        $sql="UPDATE $tabla SET estado=1 WHERE $campo=$id";
        $res=$this->db->query($sql);
        if($res){
            return $tabla;
        }else{
            return 0;
        }
    }
    public function login($data){
        $data = json_decode($data);
        $usuario=$data->usuario;
        $clave=$data->clave;
        $sql = "SELECT idUsuario,nombre FROM usuarios WHERE usuario = '".$usuario."' AND clave = '".$clave."' AND estado=1";
        $res = $this->db->get_results($sql);
        $nombre=$res[0]->nombre;
        $id=$res[0]->idUsuario;
        if($res!=null){
            session_start();
            $_SESSION['Exsanombre'] = $this->codificarPalabra($nombre);
            $_SESSION['Exsausuario'] = $usuario;
            $_SESSION['ExsaidUsuario'] = $id;
            $_SESSION['Exsaestado'] = 1;
            $_SESSION['Exsaclave'] = $clave;
            return 1; 
        }else{
            return 0; 
        }
    }
    private function getUsuario()
    {
        session_start();
        $idUsuario=$_SESSION['ExsaidUsuario'];
        return $idUsuario;
    }
    public function getMenuAdmin()
    {
        $sql="SELECT idMenu,descripcion AS nombre,url1,url2,estado,CASE WHEN main=1 THEN 'Si' ELSE 'No' END AS main FROM menu";
        $res=$this->db->get_results($sql);
        if($res){
            return $res;
        }else{
            return 0;
        }
    }
    public function saveMenu($data)
    {
        $data=json_decode($data);
        $nombre=$data->nombre;
        $link1=$data->link1;
        $link2=$data->link2;
        $main=$data->main;
        $usuario=$this->getUsuario();
        if($main==1){
            $sqlUpdateMain="UPDATE menu SET main=0";
            $this->db->query($sqlUpdateMain);
        }
        $sql="INSERT INTO menu (descripcion,url1,url2,idUsuario,main) VALUES ('$nombre','$link1','$link2',$usuario,$main)";
        $res=$this->db->query($sql);
        if($res){
            return 1;
        }else{
            return 0;
        }
    }
    public function updateMenu($data)
    {
        $data=json_decode($data);
        $nombre=$data->nombre;
        $link1=$data->link1;
        $link2=$data->link2;
        $main=$data->main;
        $idMenu=$data->id;
        if($main==1){
            $sqlUpdateMain="UPDATE menu SET main=0";
            $this->db->query($sqlUpdateMain);
            $sqlUpdateSBM="UPDATE item_menu SET tipo=1";
            $this->db->query($sqlUpdateSBM);
            $sqlUpdateSbmMain="UPDATE item_menu SET tipo=0 WHERE idMenu=$idMenu";
            $this->db->query($sqlUpdateSbmMain);
        }else{
            $sqlUpdateSbmMain="UPDATE item_menu SET tipo=1 WHERE idMenu=$idMenu";
            $this->db->query($sqlUpdateSbmMain);
        }
        $sql="UPDATE menu SET descripcion='$nombre',url1='$link1',url2='$link2',main=$main WHERE idMenu=$idMenu";
        $res=$this->db->query($sql);
        if($res){
            return 1;
        }else{
            return 0;
        }
    }
    public function getItemMenu()
    {
        $sql="SELECT i.idItemMenu,i.descripcion AS nombre,i.url1,i.url2,i.orden,i.tipo,i.imagen,i.idMenu,m.descripcion AS menu,i.estado FROM item_menu i JOIN menu m ON i.idMenu=m.idMenu ORDER BY i.idMenu,i.orden";
        $res=$this->db->get_results($sql);
        if($res){
            return $res;
        }else{
            return 0;
        }
    }
    public function saveItemMenu($data)
    {
        $data=json_decode($data);
        $nombre=$data->nombre;
        $link1=$data->link1;
        $link2=$data->link2;
        $menu=$data->menu;
        $orden=$data->orden;
        $imagen=$data->imagen;
        if($imagen != ""){
            $nombreImagen=$this->sanear_string(str_replace(" ", "-", $nombre).'.jpg');       
            $this->guardarImagen($imagen,'../../imagenes/contenidos/',$nombreImagen);
            $sql="INSERT INTO item_menu (descripcion,url1,url2,orden,idMenu,imagen) VALUES ('$nombre','$link1','$link2',$orden,$menu,'$nombreImagen')";
        }else{
            $sql="INSERT INTO item_menu (descripcion,url1,url2,orden,idMenu) VALUES ('$nombre','$link1','$link2',$orden,$menu)";
        }
        $res=$this->db->query($sql);
        if($res){
            return 1;
        }else{
            return 0;
        }
    }
    public function updateItemMenu($data)
    {
        $data=json_decode($data);
        $nombre=$data->nombre;
        $link1=$data->link1;
        $link2=$data->link2;
        $menu=$data->menu;
        $orden=$data->orden;
        $idItemMenu=$data->id;
        $imagen=$data->imagen;
        if($imagen != ""){
            $nombreImagen=$this->sanear_string(str_replace(" ", "-", $nombre).'.jpg');       
            $this->guardarImagen($imagen,'../../imagenes/contenidos/',$nombreImagen);
            $sql="UPDATE item_menu SET descripcion='$nombre',url1='$link1',url2='$link2',orden=$orden,idMenu=$menu,imagen='$nombreImagen' WHERE idItemMenu=$idItemMenu";
        }else{
            $sql="UPDATE item_menu SET descripcion='$nombre',url1='$link1',url2='$link2',orden=$orden,idMenu=$menu WHERE idItemMenu=$idItemMenu";
        }
        $res=$this->db->query($sql);
        if($res){
            return 1;
        }else{
            return 0;
        }
    }
    public function getPagina()
    {
        $sql="SELECT idPagina,titulo,estado FROM pagina";
        $res=$this->db->get_results($sql);
        $data = array();
        foreach ($res as $paginas)
        {
            $datos=new stdClass();
            $idPagina=$paginas->idPagina;
            $datos->idPagina=$idPagina;
            $datos->titulo=$paginas->titulo;
            $datos->estado=$paginas->estado;
            $sqlPaginaItem="SELECT idItemMenu,descripcion FROM item_menu WHERE idItemMenu=(SELECT idItemMenu FROM item_menu_pagina WHERE idPagina=$idPagina)";
            $result=$this->db->get_results($sqlPaginaItem);
            $datos->idItem_menu=$result[0]->idItemMenu;
            $datos->descripcion=$result[0]->descripcion;
            $data[]=$datos;
        }
        if($res){
            return $data;
        }else{
            return 0;
        }
    }
    public function savePagina($data)
    {
        $data=json_decode($data);
        $titulo=$data->titulo;
        $itemMenu=$data->itemMenu;
        $usuario=$this->getUsuario();
        $sql="INSERT INTO pagina (titulo,idUsuario) VALUES ('$titulo',$usuario)";
        $res=$this->db->query($sql);
        $idNuevo=$this->db->insert_id;
        $sqlRelacion="INSERT INTO item_menu_pagina (idItemMenu,idPagina) VALUES ($itemMenu,$idNuevo)";
        $this->db->query($sqlRelacion);
        if($res){
            return 1;
        }else{
            return 0;
        }
    }
    public function updatePagina($data)
    {
        $data=json_decode($data);
        $titulo=$data->titulo;
        $itemMenu=$data->itemMenu;
        $idPagina=$data->id;
        $sqlUpdate="UPDATE pagina SET titulo='$titulo' WHERE idPagina=$idPagina";
        $res=$this->db->query($sqlUpdate);
        $sqlUpdateRelacion="UPDATE item_menu_pagina SET idItemMenu=$itemMenu WHERE idPagina=$idPagina";
        //return $sqlUpdateRelacion;
        $this->db->query($sqlUpdateRelacion);
        if($res){
            return 1;
        }else{
            return 0;
        }
    }
    public function getContenidos()
    {
        $sql="SELECT idContenido,nombre,titulo,subTitulo,texto,estado FROM contenido";
        $res=$this->db->get_results($sql);
        if($res){
            return $res;
        }else{
            return 0;
        }
    }
    public function saveContenido($data)
    {
        $data=json_decode($data);
        $nombre=$data->nombre;
        $titulo=$data->titulo;
        $subTitulo=$data->subTitulo;
        $texto=$data->texto;
        $usuario=$this->getUsuario();
        $sql="INSERT INTO contenido (nombre,titulo,subTitulo,texto,idUsuario) VALUES ('$nombre','$titulo','$subTitulo','$texto',$usuario)";
        $res=$this->db->query($sql);
        if($res){
            return 1;
        }else{
            return 0;
        }
    }
    public function updateContenido($data)
    {
        $data=json_decode($data);
        $titulo=$data->titulo;
        $subTitulo=$data->subTitulo;
        $texto=$data->texto;
        $idContenido=$data->id;
        $sql="UPDATE contenido SET titulo='$titulo',subTitulo='$subTitulo',texto='$texto' WHERE idContenido=$idContenido";
        $res=$this->db->query($sql);
        if($res){
            return 1;
        }else{
            return 0;
        }
    }
    public function asignaContenido($data)
    {
        $data=json_decode($data);
        $idContenido=$data->idContenido;
        $idPagina=$data->idPagina;
        $sqlVerifica="SELECT COUNT(idPagina) FROM pagina_has_contenido WHERE idPagina=$idPagina AND idContenido=$idContenido";
        $validado=$this->db->get_var($sqlVerifica);
        if($validado > 0){
            return 2;
        }else{
            $sql="INSERT INTO pagina_has_contenido (idPagina,idContenido) VALUES ($idPagina,$idContenido)";
            $res=$this->db->query($sql);
        }
        if($res){
            return 1;
        }else{
            return 0;
        }
    }
    public function getAsignacionMenu()
    {
        $sql="SELECT d.id,i.descripcion AS item,m.descripcion AS menu,d.idItemMenu,d.idMenu,d.estado FROM menu_has_item_menu d JOIN menu m ON d.idMenu=m.idMenu JOIN item_menu i ON i.idItemMenu=d.idItemMenu";
        $res=$this->db->get_results($sql);
        if($res){
            return $res;
        }else{
            return 0;
        }
    }
    public function saveAsignacionMenu($data)
    {
        $data=json_decode($data);
        $idMenu=$data->idMenu;
        $idItemMenu=$data->idItemMenu;
        $sql="INSERT INTO menu_has_item_menu (idItemMenu,idMenu) VALUES ($idItemMenu,$idMenu)";
        $res=$this->db->query($sql);
        if($res){
            return 1;
        }else{
            return 0;
        }
    }
    public function getContenidoMin()
    {
        $sql="SELECT idContenido,nombre FROM contenido WHERE estado=1";
        $res=$this->db->get_results($sql);
        return $res;
    }
    public function getFormulariosMin()
    {
        $sql="SELECT idFormulario,descripcion FROM formularios WHERE estado=1";
        $res=$this->db->get_results($sql);
        return $res;
    }
    public function getElementosFormulario()
    {
        $sql="SELECT idElementoFormulario,descripcion FROM elementos_formulario";
        $res=$this->db->get_results($sql);
        return $res;
    }
    public function getFormularios()
    {
        $sql="SELECT f.idFormulario,f.descripcion,f.claseFormulario,f.estado,f.idUsuario,c.idContenido FROM formularios f JOIN contenido_formulario c ON f.idFormulario=c.idFormulario";
        $res=$this->db->get_results($sql);
        if($res){
            return $res;
        }else{
            return 0;
        }
    }
    public function saveFormulario($data)
    {
        $data=json_decode($data);
        $contenido=$data->contenido;
        $descripcion=$data->descripcion;
        $clase=$data->clase;
        $usuario=$this->getUsuario();
        $sql="INSERT INTO formularios (descripcion,claseFormulario,idUsuario) VALUES ('$descripcion','$clase',$usuario)";
        $res=$this->db->query($sql);
        $idNuevo=$this->db->insert_id;
        $verif="SELECT COUNT(idContenido) FROM contenido_formulario WHERE idContenido=$contenido AND idFormulario=$idNuevo";
        $valida=$this->db->get_var($verif);
        if($valida < 1){
            $sqlLiga="INSERT INTO contenido_formulario (idContenido,idFormulario) VALUES ($contenido,$idNuevo)";
            $this->db->query($sqlLiga);
        }            
        if($res){
            return 1;
        }else{
            return 0;
        }
    }
    public function updateFormulario($data)
    {
        $data=json_decode($data);
        $contenido=$data->contenido;
        $descripcion=$data->descripcion;
        $clase=$data->clase;
        $idFormulario=$data->id;
        $sql="UPDATE formularios SET descripcion='$descripcion',claseFormulario='$clase' WHERE idFormulario=$idFormulario";
        $res=$this->db->query($sql);
        $sql2="UPDATE contenido_formulario SET idContenido='$contenido',idFormulario='$idFormulario' WHERE idFormulario=$idFormulario";
        $res2=$this->db->query($sql2);
        if($res2==true or $res==true){
            return 1;
        }else{
            return 0;
        }
    }
    public function getPost()
    {
        $sql="SELECT p.idPost,p.titulo,p.contenido,p.fecha,p.estado,p.idUsuario,$this->campoLink AS url,u.usuario FROM post p 
            JOIN usuarios u ON p.idUsuario=u.idUsuario WHERE p.estado=1 ORDER BY p.fecha DESC";
        $res=$this->db->get_results($sql);
        $data = array();
        foreach ($res as $posts)
        {
            $datos=new stdClass();
            $idPost=$posts->idPost;
            $datos->idPost=$idPost;
            $datos->titulo=$posts->titulo;
            $datos->contenido=$posts->contenido;
            $datos->url=$posts->url;
            $datos->fecha=$posts->fecha;
            $datos->estado=$posts->estado;
            $datos->idUsuario=$posts->idUsuario;
            $datos->usuario=$posts->usuario;
            $sqlComentarios="SELECT COUNT(idComentario) FROM comentario_post WHERE idPost=$idPost AND estado=1";
            $comentarios=$this->db->get_var($sqlComentarios);
            $datos->comentarios=$comentarios;
            $data[]=$datos;
        }
        return $data;
    }
    public function getPostEspecifico($data)
    {
        $seccion=json_decode($data);
        $sql="SELECT p.idPost,p.titulo,p.contenido,p.fecha,u.usuario FROM post p 
            JOIN usuarios u ON p.idUsuario=u.idUsuario WHERE p.estado=1 AND url1='$seccion'";
        $res=$this->db->get_results($sql);
        $data = array();
        foreach ($res as $posts)
        {
            $datos=new stdClass();
            $idPost=$posts->idPost;
            $datos->idPost=$idPost;
            $datos->titulo=$posts->titulo;
            $datos->contenido=$posts->contenido;
            $datos->fecha=$posts->fecha;
            $datos->usuario=$posts->usuario;
            $datos->seccion=$seccion;
            $sqlComentarios="SELECT * FROM comentario_post WHERE idPost=$idPost AND estado=1";
            $comentarios=$this->db->get_var($sqlComentarios);
            $datos->comentarios=$comentarios;
            $data[]=$datos;
        }
        return $data;
    }
    public function getBusquedas($data)
    {
        $texto=json_decode($data);
        $sqlContenidos="SELECT idContenido,nombre,titulo,texto FROM contenido WHERE nombre LIKE '%$texto%' OR titulo LIKE '%$texto%' OR texto LIKE '%$texto%'";
        $res=$this->db->get_results($sqlContenidos);
        $contenidos = array();
        foreach ($res as $cts)
        {
            $contenido=new stdClass();
            $idContenido=$cts->idContenido;
            $contenido->nombre=$cts->nombre;
            $contenido->titulo=$cts->titulo;
            $contenido->texto=$cts->texto;
            $sqlPagina="SELECT idPagina FROM pagina_has_contenido WHERE idContenido=$idContenido";
            $pagina=$this->db->get_var($sqlPagina);
            $sqlItem="SELECT idItemMenu FROM item_menu_pagina WHERE idPagina=$pagina";
            $idItem=$this->db->get_var($sqlItem);
            $sqlUrl="SELECT $this->campoLink AS url FROM item_menu WHERE idItemMenu=$idItem";
            $url=$this->db->get_var($sqlUrl);
            $contenido->url=$url;
            $contenidos[]=$contenido;
        }

        $sqlPost="SELECT titulo AS nombre,titulo,contenido AS texto,$this->campoLink AS url FROM post WHERE titulo LIKE '%$texto%' OR contenido LIKE '%$texto%'";
        $res2=$this->db->get_results($sqlPost);
        foreach ($res2 as $pst)
        {
            $post=new stdClass();
            $post->nombre=$pst->nombre;
            $post->titulo=$pst->titulo;
            $post->texto=$pst->texto;
            $post->url=$pst->url;
            $contenidos[]=$post;
        }
        return $contenidos;
    }

    */
    // Validador:  http://localhost/mineriasegura/admin/service/php/gosu/
    // $this->db->get_results($res); -> Arroja todos los resultados de una consukta sql cuando hayan mas de 2 columnas en el resultado
    // $this->db->get_var($res); -> Arroja el resultado cuando la consulta devuelve 1 solo campo de un solo registro
    // $this->db->query($sql);  -> grabar y editrar
    public function getPostId2($data)
    {
        $data=json_decode($data);
        $sql="SELECT * FROM post WHERE idPost=$data";
        $res=$this->db->get_results($sql);
        return $res;
    }
    public function getPosts2()
    {
        $sql="SELECT idPost,titulo,contenidoMuestra AS contenido,mostrarImagen,imagenPortada,$this->campoLink AS url,fechaPublicacion AS fecha,estado,idUsuario,idCategoria FROM post P ORDER BY idPost DESC";
        $result=$this->db->get_results($sql);
        return $result;
    }
    public function getPosts()
    {
        $sql="SELECT idPost,titulo,contenidoMuestra AS contenido,mostrarImagen,imagenPortada,$this->campoLink AS url,fechaPublicacion AS fecha,estado,idUsuario,idCategoria FROM post P  WHERE estado=1 ORDER BY idPost DESC LIMIT 10";
        $result=$this->db->get_results($sql);
        return $result;
    }
    public function getPostsLike($data)
    {
        $data=json_decode($data);
        $sql="SELECT idPost,titulo,contenidoMuestra AS contenido,mostrarImagen,imagenPortada,$this->campoLink AS url,fechaPublicacion AS fecha,estado,idUsuario,idCategoria FROM post P  WHERE titulo LIKE '%$data%' OR contenido LIKE '%$data%' OR fechaPublicacion LIKE '%$data%' AND estado=1 ORDER BY idPost DESC";
        $result=$this->db->get_results($sql);
        return $result;
    }
    public function getPostId($data){
        $id=json_decode($data);
        $sql="SELECT idPost,titulo,contenido,mostrarImagen,imagenPost,$this->campoLink AS url,fechaPublicacion AS fecha,estado,idUsuario,idCategoria FROM post WHERE idPost='$id'";
        $result=$this->db->get_results($sql);
        return $result;
    }
    public function getCategorias(){
        $sql="SELECT idCategoria,descripcionCategoria AS categoria, estado, $this->campoLink AS url FROM categorias WHERE estado=1 ORDER BY idCategoria DESC";
        $result=$this->db->get_results($sql);
        $data=array();
        foreach ($result as $row)
        {
            $post=new stdClass();
            $idCategoria=$row->idCategoria;
            $post->idCategoria=$idCategoria;
            $post->categoria=$row->categoria;
            $sqlPost="SELECT idPost,titulo,contenidoMuestra AS contenido,mostrarImagen,$this->campoLink AS url,fechaPublicacion AS fecha,estado,idUsuario,idCategoria,imagenPortada FROM post WHERE idCategoria=$idCategoria AND estado=1 ORDER BY idPost DESC LIMIT 1";
            $ultimoPost=$this->db->get_results($sqlPost);
            $post->post=$ultimoPost;
            $data[]=$post;
        }
        return $data;
    }
    public function getPostCategoria($categoria)
    {
        $categoria=json_decode($categoria);
        $sql="SELECT idPost,titulo,contenidoMuestra AS contenido,mostrarImagen,imagenPortada,$this->campoLink AS url,fechaPublicacion AS fecha,estado,idUsuario,idCategoria FROM post where idCategoria=$categoria and estado=1 ORDER BY idPost ASC ";
        $result=$this->db->get_results($sql);
        return $result;
    }
    public function getAllCategorias(){
        $sql="SELECT c.idCategoria,c.descripcionCategoria AS categoria, c.estado, c.$this->campoLink AS url,(SELECT COUNT(p.idPost) FROM post p WHERE p.idCategoria=c.idCategoria) AS posts FROM categorias c WHERE c.estado=1";
        $result=$this->db->get_results($sql);
        return $result;
    }
    //CLASE PARA ELIMINAR
    public function eliminar($data){
        $data=json_decode($data);
        $campo=$data->campo;
        $tabla=$data->tabla;
        $id=$data->id;
        $sql="UPDATE $tabla SET estado=0 WHERE $campo=$id";
        $res=$this->db->query($sql);
        if($res){
            return $tabla;
        }else{
            return 0;
        }
    }
    //CLASE PARA RECUPERAR
    public function recuperar($data){
        $data=json_decode($data);
        $campo=$data->campo;
        $tabla=$data->tabla;
        $id=$data->id;
        $sql="UPDATE $tabla SET estado=1 WHERE $campo=$id";
        $res=$this->db->query($sql);
        if($res){
            return $tabla;
        }else{
            return 0;
        }
    }
    /**
        FUNCIONES PARA EL ADMINISTRADOR
    **/

    public function login($data){
        $data = json_decode($data);
        $usuario=$data->usuario;
        $clave=$data->clave;
        $sql = "SELECT idUsuario,nombre FROM usuarios WHERE usuario = '".$usuario."' AND clave = '".$clave."' AND estado=1";
        $res = $this->db->get_results($sql);
        $nombre=$res[0]->nombre;
        $id=$res[0]->idUsuario;
        if($res!=null){
            session_start();
            $_SESSION['Msnombre'] = $this->codificarPalabra($nombre);
            $_SESSION['Msusuario'] = $usuario;
            $_SESSION['MsidUsuario'] = $id;
            $_SESSION['Msestado'] = 1;
            $_SESSION['Msclave'] = $clave;
            return 1; 
        }else{
            return 0; 
        }
    }
    public function savePost($data)
    {
        $data=json_decode($data);
        $fechaPublicacion=$data->fecha;
        $categoria=$data->idCategoria;
        $titulo=$data->titulo;
        $link1=$this->sanear_string($data->url1);
        //return $link1;
        $link2=$data->url2;
        $contenido=$data->contenido;
        $contenidoMuestra=$data->contenidoMuestra;
        $imagen1=$data->imagen1;
        $nombreImg1=$link1.'-portada.jpg';
        $imagen2=$data->imagen2;
        $nombreImg2=$link1.'.jpg';
        date_default_timezone_set('America/Lima');
        $fecha = new DateTime();
        $fechaRegistro=$fecha->format("Y-m-d");
        session_start();
        $usuario=$_SESSION['MsidUsuario'];
        $sql="INSERT INTO post (titulo,contenido,contenidoMuestra,imagenPortada,imagenPost,url1,url2,fechaRegistro,fechaPublicacion,idUsuario,idCategoria) 
        VALUES ('$titulo','$contenido','$contenidoMuestra','$nombreImg1','$nombreImg2','$link1','$link2','$fechaRegistro','$fechaPublicacion',$usuario,$categoria)";
        $res=$this->db->query($sql);
        if($res){
            $this->guardarImagen($imagen1,'../../imagenes/',$nombreImg1);
            $this->guardarImagen($imagen2,'../../imagenes/',$nombreImg2);
            return 1;
        }else{
            return 0;
        }
    }
    public function editarPost($data)
    {
        $data=json_decode($data);
        $id=$data->id;
        $fechaPublicacion=$data->fecha;
        $categoria=$data->idCategoria;
        $titulo=$data->titulo;
        $link1=$this->sanear_string($data->url1);
        //return $link1;
        $link2=$data->url2;
        $contenido=$data->contenido;
        $contenidoMuestra=$data->contenidoMuestra;
        $imagen1=$data->imagen1;
        $nombreImg1=$link1.'-portada.jpg';
        $imagen2=$data->imagen2;
        $nombreImg2=$link1.'.jpg';
        date_default_timezone_set('America/Lima');
        $fecha = new DateTime();
        $fechaRegistro=$fecha->format("Y-m-d");
        session_start();
        $usuario=$_SESSION['MsidUsuario'];
        if($imagen1!=""){
            $sql="UPDATE post SET titulo='$titulo',contenido='$contenido',contenidoMuestra='$contenidoMuestra',fechaPublicacion='$fechaPublicacion',idCategoria='$categoria',url1='$link1',url2='$link2',imagenPortada='$nombreImg1',imagenPost='$nombreImg2' WHERE idPost=$id";
        }else{
            $sql="UPDATE post SET titulo='$titulo',contenido='$contenido',contenidoMuestra='$contenidoMuestra',fechaPublicacion='$fechaPublicacion',idCategoria='$categoria',url1='$link1',url2='$link2' WHERE idPost=$id";
        }
        $res=$this->db->query($sql);
        if($res){
            if($imagen1!=""){
                $this->guardarImagen($imagen1,'../../imagenes/',$nombreImg1);
                $this->guardarImagen($imagen2,'../../imagenes/',$nombreImg2);
                return 1;
            }
        }else{
            return 0;
        }
    }
    public function saveItemMenu($data)
    {
        $data=json_decode($data);
        $nombre=$data->nombre;
        $link1=$data->link1;
        $link2=$data->link2;
        $orden=$data->orden;
        $pestana=$data->pestana;
        $sql="INSERT INTO item_menu (descripcion,url1,url2,orden,nuevaPestana) VALUES ('$nombre','$link1','$link2',$orden,$pestana)";
        $res=$this->db->query($sql);
        $idNuevo=$this->db->insert_id;
        $sql2="INSERT INTO menu_has_item_menu (idItemMenu,idMenu)VALUES($idNuevo,2)";
        $this->db->query($sql2);
        if($res){
            return 1;
        }else{
            return 0;
        }
    }
    public function updateItemMenu($data)
    {
        $data=json_decode($data);
        $nombre=$data->nombre;
        $link1=$data->link1;
        $link2=$data->link2;
        $orden=$data->orden;
        $pestana=$data->pestana;
        $idItemMenu=$data->id;
        $sql="UPDATE item_menu SET descripcion='$nombre',url1='$link1',url2='$link2',orden=$orden,nuevaPestana=$pestana WHERE idItemMenu=$idItemMenu";
        $res=$this->db->query($sql);
        if($res){
            return 1;
        }else{
            return 0;
        }
    }
    public function getMenuAdmin()
    {
        $sql="SELECT i.idItemMenu,i.descripcion AS nombre,i.url1,i.url2,i.orden,i.tipo,i.imagen,i.estado,i.nuevaPestana FROM item_menu i ORDER BY i.idMenu,i.orden";
        $res=$this->db->get_results($sql);
        if($res){
            return $res;
        }else{
            return 0;
        }
    }
    public function getMenuItem($data)
    {
        $data=json_decode($data);
        $sql="SELECT i.idItemMenu,i.descripcion AS nombre,i.url1,i.url2,i.orden,i.tipo,i.imagen,i.estado,i.nuevaPestana FROM item_menu i WHERE i.estado=1 AND i.idItemMenu=$data ORDER BY i.idMenu,i.orden";
        $res=$this->db->get_results($sql);
        if($res){
            return $res;
        }else{
            return 0;
        }
    }
    public function getMenu()
    {
        $sql="SELECT idMenu,descripcion,$this->campoLink AS url,url1 AS guiaLink FROM menu WHERE main=1 AND estado=1";
        $main=$this->db->get_results($sql);
        $idMenu=$main[0]->idMenu;
        $nombreMenu=$this->codificarPalabra($main[0]->descripcion);
        $url=$main[0]->url;
        $guiaLink=$main[0]->guiaLink;
        $sqlItem="SELECT idItemMenu,descripcion,$this->campoLink AS url,url1 AS guiaLink,nuevaPestana AS pestana FROM item_menu WHERE idMenu=$idMenu AND tipo=0 AND estado=1 ORDER BY orden";
        //return $sqlItem;
        $items=$this->db->get_results($sqlItem);
        $lvl1 = array();
        foreach ($items as $item) 
        {         
            $menuLvl1 = new stdClass();   
            $idItemMenu=$item->idItemMenu;
            $menuLvl1->idItemMenu=$idItemMenu;            
            $menuLvl1->descripcion=$this->codificarPalabra($item->descripcion);
            $menuLvl1->url=$item->url;
            $menuLvl1->guiaLink=$item->guiaLink;
            $menuLvl1->pestana=$item->pestana;
                $sqlMenuLvl2="SELECT idMenu FROM menu_has_item_menu WHERE idItemMenu=$idItemMenu AND estado=1";
                $idMenuLvl2=$this->db->get_var($sqlMenuLvl2);
                if($idMenuLvl2 != null){
                    $sqlItemLvl2="SELECT idItemMenu,descripcion,$this->campoLink AS url,url1 AS guiaLink,nuevaPestana AS pestana FROM item_menu WHERE idMenu=$idMenuLvl2 AND tipo=1 AND estado=1 ORDER BY orden";                    
                    $itemsLvl2=$this->db->get_results($sqlItemLvl2);
                    $lvl2 = array();
                    foreach ($itemsLvl2 as $itemlVL2) 
                    {         
                        $menuLvl2 = new stdClass();   
                        $idItemMenuLvl2=$itemlVL2->idItemMenu;
                        $menuLvl2->idItemMenu=$idItemMenuLvl2;            
                        $menuLvl2->descripcion=$this->codificarPalabra($itemlVL2->descripcion);
                        $menuLvl2->url=$itemlVL2->url;
                        $menuLvl2->guiaLink=$itemlVL2->guiaLink;
                        $menuLvl2->pestana=$itemlVL2->pestana;
                            $sqlMenuLvl3="SELECT idMenu FROM menu_has_item_menu WHERE idItemMenu=$idItemMenuLvl2 AND estado=1";                            
                            $idMenuLvl3=$this->db->get_var($sqlMenuLvl3);
                            if($idMenuLvl3 != null){
                                $sqlItemLvl3="SELECT idItemMenu,descripcion,$this->campoLink AS url,url1 AS guiaLink,nuevaPestana AS pestana FROM item_menu WHERE idMenu=$idMenuLvl3 AND tipo=1 AND estado=1 ORDER BY orden";                        
                                $itemsLvl3=$this->db->get_results($sqlItemLvl3);
                                $lvl3 = array();
                                foreach ($itemsLvl3 as $itemlVL3) 
                                {         
                                    $menuLvl3 = new stdClass();   
                                    $idItemMenuLvl3=$itemlVL3->idItemMenu;
                                    $menuLvl3->idItemMenu=$idItemMenuLvl3;            
                                    $menuLvl3->descripcion=$this->codificarPalabra($itemlVL3->descripcion);
                                    $menuLvl3->url=$itemlVL3->url;
                                    $menuLvl3->guiaLink=$itemlVL3->guiaLink;
                                    $menuLvl3->pestana=$itemlVL3->pestana;
                                        $sqlMenuLvl4="SELECT idMenu FROM menu_has_item_menu WHERE idItemMenu=$idItemMenuLvl3 AND estado=1";
                                        $idMenuLvl4=$this->db->get_var($sqlMenuLvl4);
                                        if($idMenuLvl4 != null){                                            
                                            $sqlItemLvl4="SELECT idItemMenu,descripcion,$this->campoLink AS url,url1 AS guiaLink FROM item_menu WHERE idMenu=$idMenuLvl4 AND tipo=1 AND estado=1 ORDER BY orden";
                                            $itemsLvl4=$this->db->get_results($sqlItemLvl4);                                           
                                        }else{
                                            $itemsLvl4=null;
                                        }
                                    $menuLvl3->hijos=$itemsLvl4;
                                    $lvl3[]=$menuLvl3;
                                }                                
                            }else{
                                $lvl3=null;
                            }
                        $menuLvl2->hijos=$lvl3;
                        $lvl2[]=$menuLvl2;
                    }
                }else{
                    $lvl2=null;
                }
            $menuLvl1->hijos=$lvl2;
            $lvl1[]=$menuLvl1;
        }
        $menu = new stdClass();
        $menu->id=$idMenu;
        $menu->nombre=$nombreMenu;
        $menu->url=$url;
        $menu->guiaLink->$guiaLink;
        $menu->items=$lvl1;
        return $menu;
    }
    public function getContenido($data)
    {
        $data=json_decode($data);
        $sqlCategoria="SELECT idCategoria FROM categorias WHERE url1='$data'";
        $idCategoria=$this->db->get_var($sqlCategoria);
        if($idCategoria != null){
            $resultado=$this->getPostCategoria($idCategoria);
            $result = new stdClass();
            $result->seccion='categoria';
            $result->data=$resultado;
            return $result;
        }else{
            $sqlPost="SELECT idPost FROM post WHERE url1='$data'";
            $idPost=$this->db->get_var($sqlPost);
            if($idPost != null){
                $resultado=$this->getPostId($idPost);
                $result = new stdClass();
                $result->seccion='post';
                $result->data=$resultado;
                return $result;
            }else{
                if($data=='inicio' OR $data==""){
                    $result = new stdClass();
                    $result->seccion='inicio';
                    $result->data="";
                    return $result;
                }else{
                     $result = new stdClass();
                    $result->seccion='contenido';
                    $result->data=0;
                    return $result;
                }                   
            }
        }
        
    }
}
?>