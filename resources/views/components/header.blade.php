<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="#">narusheniyam.net</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        @guest
        <li class="nav-item">
          <a class="nav-link" href="/signin_adm">Администратор</a>
        </li>
        @endguest
        @auth

        <li class="nav-item">
          <a class="nav-link" href="/signout">Выход</a>
        </li>

        @endauth
      </ul>
    </div>
  </div>
</nav>