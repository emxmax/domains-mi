<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Exsatour - Lista de usuarios</title>
    <link rel="stylesheet" href="{{url('/public/stylesheets/bootstrap.min.css')}}">
  </head>
  <body>
    <div class="container">
      <br>
      <div class="text-center">
        <img src="{{url('/public/images/logo-exsatour.jpg')}}">
      </div>
      <br><br>
      <table class="table table-sm table-hover">
        <thead class="thead-inverse">
          <tr>
            <th>#</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>DNI</th>
            <th>Ciudad</th>
            <th>Celular</th>
            <th>Email</th>
            <th>Estado</th>
            <th>Fecha / Hora</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($listUsuarios as $i=> $row)
            <tr>
              <th scope="row">{{$i +1}}</th>
              <td>{{ $row->nombres }}</td>
              <td>{{ $row->apellidos }}</td>
              <td>{{ $row->dni }}</td>
              <td>{{ $row->ciudad }}</td>
              <td>{{ $row->celular }}</td>
              <td>{{ $row->email }}</td>
              <td>{{ ($row->estado==0)? 'Ausente': 'Asistió' }}</td>
              <td>{{ ($row->estado!=0)? $row->updated_at:'' }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </body>
</html>
