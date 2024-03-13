<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FreePass</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-lg-4 col-lg-offset-4" style="border :1px solid grey;padding-top: 40px;padding-bottom: 80px">
          <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
              <img src="img/freepass.jpg" alt="" class="img-responsive">
            </div>
          </div>
          <form action="inicio.php">
            <div class="form-group">
              <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Recordar contraseña
                  </label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <br><br><br>
             <button type="submit" class="btn btn-primary center-block" style="padding: 10px 60px;width:100%;color:white">Entrar</button><br>
             <button type="submit" class="btn center-block" style="padding: 10px 60px;background-color: #4267B2;color: white; width: 100%"> <i class="fa fa-facebook" aria-hidden="true"></i> Login con facebook</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>
