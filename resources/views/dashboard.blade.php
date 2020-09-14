@extends('layouts.app_auth', ['activePage' => 'dashboard', 'titlePage' => __('Sistema'), 'title' => 'Sistema'])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 col-md-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">shopping_cart</i>
              </div>
              <p class="card-category">Produtos</p>
              <h3 class="card-title">{{ $products }}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">info</i> Produtos Cadastrados
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">groups</i>
              </div>
              <p class="card-category">Usuários</p>
              <h3 class="card-title">{{ $users }}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">info</i> Usuários Cadastrados
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection