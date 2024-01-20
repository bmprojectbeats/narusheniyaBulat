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
<h1>Регистрация</h1>
<form method="POST" action="/">
    @csrf
<div class="mb-3">
    <label class="form-label">Фамилия</label>
    <input type="text" class="form-control" name="surname" style="width: 200px;">
            @error('surname')
            <div class="col-auto">
                <span id="passwordHelpInline" class="form-text" style="color: red">
                    {{$message}}
                </span>
            </div>
            @enderror
  </div>
  <div class="mb-3">
    <label class="form-label">Имя</label>
    <input type="text" class="form-control" name="name" style="width: 200px;">
    @error('name')
            <div class="col-auto">
                <span id="passwordHelpInline" class="form-text" style="color: red">
                    {{$message}}
                </span>
            </div>
            @enderror
  </div>
  <div class="mb-3">
    <label class="form-label">Отчество</label>
    <input type="text" class="form-control" name="lastname" style="width: 200px;">
    @error('lastname')
            <div class="col-auto">
                <span id="passwordHelpInline" class="form-text" style="color: red">
                    {{$message}}
                </span>
            </div>
            @enderror
  </div>
  <div class="mb-3">
    <label class="form-label">Телефон</label>
    <input type="text" class="form-control" name="number" style="width: 200px;">
    @error('number')
            <div class="col-auto">
                <span id="passwordHelpInline" class="form-text" style="color: red">
                    {{$message}}
                </span>
            </div>
            @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" style="width: 200px;">
    @error('email')
            <div class="col-auto">
                <span id="passwordHelpInline" class="form-text" style="color: red">
                    {{$message}}
                </span>
            </div>
            @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Пароль</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" style="width: 200px;">
    @error('password')
            <div class="col-auto">
                <span id="passwordHelpInline" class="form-text" style="color: red">
                    {{$message}}
                </span>
            </div>
            @enderror
  </div>
  <div class="mb-3">
  <div id="emailHelp" class="form-text">Есть аккаунт?</div>
  <a href="/signin">Войти</a>
  </div>
    
  <button type="submit" class="btn btn-primary">Регистрация</button>
</form>
</div>
</div>
    </main>

</body>
</html>