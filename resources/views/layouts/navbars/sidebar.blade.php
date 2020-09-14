<div class="sidebar" data-color="danger" data-background-color="white" data-image="/assets/images/backgrounds/background3.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="{{ route('welcome') }}" class="simple-text logo-normal">
      {{-- {{ __('Male Version Store') }} --}}
      <img src="/assets/images/logo_full.png" style="max-width: 100%; width: 100%;" >
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Início') }}</p>
        </a>
      </li>
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#usersDropdown" aria-expanded="{{ ($activePage == 'profile' || $activePage == 'user-management') ? true : false }}">
          <i class="material-icons">groups</i>
          <p>{{ __('Usuários') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse{{ ($activePage == 'profile' || $activePage == 'user-management') ? ' show' : '' }}" id="usersDropdown">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <i class="material-icons">person</i>
                <span class="sidebar-normal">{{ __('Meu Perfil') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.index') }}">
                <i class="material-icons">groups</i>
                <span class="sidebar-normal"> {{ __('Gerenciamento de Usuários') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item {{ ($activePage == 'product.add' || $activePage == 'products') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#productsDropdown" aria-expanded="{{ ($activePage == 'product.add' || $activePage == 'products') ? true : false }}">
          <i class="material-icons">shopping_cart</i>
          <p>{{ __('Produtos') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse{{ ($activePage == 'product.add' || $activePage == 'products') ? ' show' : '' }}" id="productsDropdown">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'products' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('products.view') }}">
                <i class="material-icons">format_list_bulleted</i>
                <span class="sidebar-normal">{{ __('Listar') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'product.add' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('add.product.view') }}">
                <i class="material-icons">add</i>
                <span class="sidebar-normal">{{ __('Adicionar') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      {{-- <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('table') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Table List') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'typography' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('typography') }}">
          <i class="material-icons">library_books</i>
            <p>{{ __('Typography') }}</p>
        </a>
      </li> --}}
      <li class="nav-item{{ $activePage == 'notifications' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('notifications') }}">
          <i class="material-icons">notifications</i>
          <p>{{ __('Notifications') }}</p>
        </a>
      </li>
    </ul>
  </div>
</div>