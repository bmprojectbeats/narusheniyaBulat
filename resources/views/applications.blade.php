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
    <h1>Заявления</h1><p>{{$user->name}} {{$user->surname}}</p>
            <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Подать заявку
</button>
<a class="btn btn-primary" href="/filt_desc">
 От новых к старым
</a>
<a class="btn btn-primary" href="/filt_asc">
 От старых к новым
</a>
<form action="/create_app" method="POST">
    @csrf
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Подача заявления</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="mb-3">
    <label class="form-label">Номер авто</label>
    <input type="text" class="form-control" name="number_auto">
    @error('number_auto')
            <div class="col-auto">
                <span id="passwordHelpInline" class="form-text" style="color: red">
                    {{$message}}
                </span>
            </div>
            @enderror
  </div>
  <div class="mb-3">
    <label class="form-label">Описание</label>
    <input type="text" class="form-control" name="description">
    @error('description')
            <div class="col-auto">
                <span id="passwordHelpInline" class="form-text" style="color: red">
                    {{$message}}
                </span>
            </div>
            @enderror
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
        <button type="submit" class="btn btn-primary">Отправить</button>
      </div>
    </div>
  </div>
</div>
</form>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Номер заявки</th>
      <th scope="col">Номер авто</th>
      <th scope="col">Описание</th>
      <th scope="col">Статус</th>

    </tr>
  </thead>
  <tbody>
    @foreach($apps as $app)
    <tr>
      <th scope="row">{{$app->id_app}}</th>
      <td>{{$app->number_auto}}</td>
      <td>{{$app->description}}</td>
      @if($app->status == 1)
      <td>Новое</td>
        @elseif($app->status == 2)
        <td>Подтверждено</td>
        @elseif($app->status == 3)
        <td>Отклонено</td>
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