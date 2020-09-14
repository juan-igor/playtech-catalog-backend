<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white">
  <div class="container">
    <div class="navbar-wrapper">
      <a class="navbar-brand" href="/">
        <img style="max-height: 50px; margin-top: -10px;" src="/assets/images/logo_full_rect_white.png">
      </a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
      <span class="sr-only">Toggle navigation</span>
      <span class="navbar-toggler-icon icon-bar icon-white"></span>
      <span class="navbar-toggler-icon icon-bar icon-white"></span>
      <span class="navbar-toggler-icon icon-bar icon-white"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
      <ul class="navbar-nav">
        <li class="nav-item{{ $activePage == 'home' ? ' active' : '' }}">
          <a href="/" class="nav-link">
            <i class="material-icons">home</i> Página Inicial
          </a>
        </li>
        <li class="nav-item{{ $activePage == 'catalog' ? ' active' : '' }}">
          <a href="/catalogo" class="nav-link">
            <i class="material-icons">assignment</i> Catálogo de Produtos
          </a>
        </li>
        @auth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">dashboard</i> Sistema
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a href="/sistema" class="dropdown-item">
              <i class="material-icons">home</i> Início
            </a>
            <a href="/logout" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
              <i class="material-icons">exit_to_app</i> Sair
            </a>
          </div>
        </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->