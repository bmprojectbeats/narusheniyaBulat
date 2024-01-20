<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <main>
    <x-header/>
    <div class="content">
        
    <div class="container" style="margin-top: 4%; ">
    <h1>Заявления</h1>
    <a class="btn btn-primary" href="/filt_desc_adm">
 От новых к старым
</a>
<a class="btn btn-primary" href="/filt_asc_adm">
 От старых к новым
</a>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Номер заявки</th>
      <th scope="col">ФИО</th>
      <th scope="col">Номер авто</th>
      <th scope="col">Описание</th>
      <th scope="col">Статус</th>

    </tr>
  </thead>
  <tbody>
    @foreach($apps as $app)
    <tr>
      <th scope="row">{{$app->id_app}}</th>
      <td>{{$app->name}} {{$app->surname}} {{$app->lastname}}</td>
      <td>{{$app->number_auto}}</td>
      <td>{{$app->description}}</td>
      @if($app->status == 1)
      <td>Новое</td>
        @elseif($app->status == 2)
        <td>Подтверждено</td>
        @elseif($app->status == 3)
        <td>Отклонено</td>
        @endif
        @if($app->status == 1)
        <td><a href="/accept/{{$app->id_app}}" class="btn btn-success">Принять</a></td>
        <td><a href="/decline/{{$app->id_app}}" class="btn btn-danger">Отклонить</a></td>
        @endif
    </tr>
    @endforeach
  </tbody>
</table>
{{ $apps->links('pagination::bootstrap-5') }}
</div>
    </div>
    </main>
    
</body>
</html>