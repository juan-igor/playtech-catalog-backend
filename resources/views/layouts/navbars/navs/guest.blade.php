<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white">
  <div class="container">
    <div class="navbar-wrapper">
      <a class="navbar-brand" href="{{ route('welcome') }}">
        <img style="max-height: 50px; margin-top: -10px;" src="{{ asset('assets') }}/images/logo_full_rect_white.png">
      </a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
      <span class="sr-only">Toggle navigation</span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
      <ul class="navbar-nav">
        <li class="nav-item{{ $activePage == 'home' ? ' active' : '' }}">
          <a href="{{ route('welcome') }}" class="nav-link">
            <i class="material-icons">home</i> Página Inicial
          </a>
        </li>
        <li class="nav-item{{ $activePage == 'catalog' ? ' active' : '' }}">
          <a href="{{ route('catalog') }}" class="nav-link">
            <i class="material-icons">assignment</i> Catálogo de Produtos
          </a>
        </li>
        <li class="nav-item{{ $activePage == 'login' ? ' active' : '' }}">
          <a href="{{ route('login') }}" class="nav-link">
            <i class="material-icons">fingerprint</i> Login
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->