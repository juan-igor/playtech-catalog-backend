@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'catalog', 'title' => __('Catálogo')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row justify-content-center">
      <div class="col-lg-7 col-md-8">
          <h1 class="text-white text-center">Catálogo de Produtos</h1>
      </div>
  </div>
  <div class="row justify-content-center align-items-center">
    <div class="col">
      <div class="card mx-auto product-card">
        <img class="card-img-top product-image" src="{{ asset('assets') }}/images/products/product1.jpg" alt="Imagem do Produto">
        <div class="card-body product-card-body">
          <h3 class="card-title">Short Moletom</h3>
          <p class="card-text">Short Moletom com conforto e qualidade.</p>
          <p class="card-text product-price">R$ 25,00</p>
          <div class="card-button w-100 text-center">
            <button class="btn btn-primary btn-round product-buy-button">
              <i class="material-icons">shopping_cart</i> Peça já
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
