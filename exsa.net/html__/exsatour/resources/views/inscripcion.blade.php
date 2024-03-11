<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exsatour</title>
    <link rel="stylesheet" href="{{url('/public/stylesheets/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('/public/stylesheets/master.css')}}">
  </head>
  <body>
  

    <div class="container-videos">
      <div class="video-right">
        <div class="capa-opacidad">
        </div>
        <iframe  class="playerBox" frameborder="0" allowfullscreen="1" title="YouTube video player" width="1040" height="360" src="https://www.youtube.com/embed/L2x33ffbaT4?autoplay=1&amp;modestbranding=1&amp;controls=0&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1&amp;version=3&amp;playerapiid=mbYTP_bgndVideo&amp;origin=http%3A%2F%2Fdemo.vivathemes.com&amp;allowfullscreen=true&amp;wmode=transparent&amp;iv_load_policy=3&amp;html5=1&amp;widgetid=1"></iframe>
      </div>
      <div class="video-left">
        <div class="capa-opacidad">
        </div>
        <iframe class="playerBox"  frameborder="0" allowfullscreen="1" title="YouTube video player" width="640" height="360" src="https://www.youtube.com/embed/6wVu0xY8yVo?autoplay=1&amp;modestbranding=1&amp;controls=0&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1&amp;version=3&amp;playerapiid=mbYTP_bgndVideo&amp;origin=http%3A%2F%2Fdemo.vivathemes.com&amp;allowfullscreen=true&amp;wmode=transparent&amp;iv_load_policy=3&amp;html5=1&amp;widgetid=1"></iframe>
      </div>
    </div>

    <div class="container"> 
      <div class="row justify-content-sm-center" >
        <div class="col-sm-10 col-md-7 content-central" >
          <div class="text-center logo">
            <img src="{{url('/public/images/logo-exsatour.jpg')}}">
          </div>
          <div class="text-center title">
            <img src="{{ url('/public/images/titulo.png')}}">
          </div>
          <div class="row justify-content-sm-center">
            <div class="col-md-8">
              @if( !$bcrypt && !$duplicado )
                <form method="post">
                  <div class="form-group">
                    <input type="text" id="nombres" required name="nombres" class="form-control" placeholder="Nombres" />
                  </div>
                  <div class="form-group">
                    <input type="text" id="apellidos" required name="apellidos" class="form-control" placeholder="Apellidos" />
                  </div>
                  <div class="form-group">
                    <input type="text" id="dni" maxlength="8" name="dni" required class="form-control" placeholder="DNI" />
                  </div>
                  <div class="form-group">
                    <input type="text" id="celular" name="celular" required class="form-control" placeholder="Celular" />
                  </div>
                  <div class="form-group">
                    <input type="text" id="ciudad" name="ciudad" required class="form-control" placeholder="Ciudad" />
                  </div>
                  
                  <div class="form-group">
                    <input type="email" id="email" name="email" required class="form-control" placeholder="Email" />
                  </div>
                  <div class="text-center">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-primary">Regístrate</button>
                  </div>

                </form>
              @elseif($duplicado)
                <div class="content-thanks text-center">
                  <div class="descripcion">
                    <br>
                    <br>
                    Este usuario ya se encuentra registrado, Gracias!
                    <br>
                    <br>
                    <br>
                    <a href="{{url('/')}}" class="btn btn-primary">Registrar uno nuevo</a>
                  </div>

                  
                </div>
              @else
                <div class="content-thanks text-center">
                  <div class="descripcion">
                    Su registro se ha realizado correctamente, hemos enviado su Boarding Pass al correo: {{$email}}
                    <br>
                    <br>
                    <br>
                    <a href="{{url('/')}}" class="btn btn-primary">Registrar uno nuevo</a>
                  </div>

                </div>
                
              @endif
              <div class="text-center exsa-cruz-logo">
                <img src="{{url('/public/images/logo-exsatour-cruzdelsur.jpg')}}">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer">
    </div>
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript">
  
    $(function() {


      $('form').on('submit', function(event) {
        $('button').attr('disabled',true);
      });
    });
  </script>

</html>
