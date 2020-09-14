@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'catalog', 'title' => __('Catálogo')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row justify-content-center">
      <div class="col-lg-7 col-md-8">
          <h1 class="text-white text-center">Catálogo de Produtos</h1>
      </div>
  </div>
  <div class="row justify-content-center align-items-center" id="catalog-div">
    <div id="loading-div" class="loading-spinner-pulse">
      <div class="loading-bars bk-white">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
      </div>
    </div>
    {{-- <div class="col">
      <div class="card mx-auto product-card">
        <div class="row justify-content-center align-items-center product-image-div">
          <img class="card-img-top product-image" src="/assets/images/products/product1.jpg" alt="Imagem do Produto">
        </div>
        <div class="card-body product-card-body">
          <h3 class="card-title">Short Moletom</h3>
          <p class="card-text">Short moletom com conforto e qualidade.</p>
          <p class="card-text">Tamanhos P e M.</p>
          <p class="card-text product-price">R$ 20,00</p>
          <div class="card-button w-100 text-center">
            <a class="btn btn-primary btn-round product-buy-button" href="https://www.instagram.com/male_version_store_oficial/" target="_blank">
              <i class="fa fa-instagram"></i>&nbsp;&nbsp; Faça seu Pedido
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card mx-auto product-card">
        <div class="row justify-content-center align-items-center product-image-div">
          <img class="card-img-top product-image" src="/assets/images/products/product2.jpg" alt="Imagem do Produto">
        </div>
        <div class="card-body product-card-body">
          <h3 class="card-title">Short Moletom</h3>
          <p class="card-text">Short moletom com conforto e qualidade.</p>
          <p class="card-text">Tamanhos P e M.</p>
          <p class="card-text product-price">R$ 20,00</p>
          <div class="card-button w-100 text-center">
            <a class="btn btn-primary btn-round product-buy-button" href="https://www.instagram.com/male_version_store_oficial/" target="_blank">
              <i class="fa fa-instagram"></i>&nbsp;&nbsp; Faça seu Pedido
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card mx-auto product-card">
        <div class="row justify-content-center align-items-center product-image-div">
          <img class="card-img-top product-image" src="/assets/images/products/product3.jpg" alt="Imagem do Produto">
        </div>
        <div class="card-body product-card-body">
          <h3 class="card-title">Short Moletom</h3>
          <p class="card-text">Short moletom com conforto e qualidade.</p>
          <p class="card-text">Tamanhos P e M.</p>
          <p class="card-text product-price">R$ 20,00</p>
          <div class="card-button w-100 text-center">
            <a class="btn btn-primary btn-round product-buy-button" href="https://www.instagram.com/male_version_store_oficial/" target="_blank">
              <i class="fa fa-instagram"></i>&nbsp;&nbsp; Faça seu Pedido
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card mx-auto product-card">
        <div class="row justify-content-center align-items-center product-image-div">
          <img class="card-img-top product-image" src="/assets/images/products/product4.jpg" alt="Imagem do Produto">
        </div>
        <div class="card-body product-card-body">
          <h3 class="card-title">Short Moletom</h3>
          <p class="card-text">Short moletom com conforto e qualidade.</p>
          <p class="card-text">Tamanhos P e M.</p>
          <p class="card-text product-price">R$ 20,00</p>
          <div class="card-button w-100 text-center">
            <a class="btn btn-primary btn-round product-buy-button" href="https://www.instagram.com/male_version_store_oficial/" target="_blank">
              <i class="fa fa-instagram"></i>&nbsp;&nbsp; Faça seu Pedido
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card mx-auto product-card">
        <div class="row justify-content-center align-items-center product-image-div">
          <img class="card-img-top product-image" src="/assets/images/products/product5.jpg" alt="Imagem do Produto">
        </div>
        <div class="card-body product-card-body">
          <h3 class="card-title">Short Moletom</h3>
          <p class="card-text">Short moletom com conforto e qualidade.</p>
          <p class="card-text">Tamanhos P e M.</p>
          <p class="card-text product-price">R$ 20,00</p>
          <div class="card-button w-100 text-center">
            <a class="btn btn-primary btn-round product-buy-button" href="https://www.instagram.com/male_version_store_oficial/" target="_blank">
              <i class="fa fa-instagram"></i>&nbsp;&nbsp; Faça seu Pedido
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card mx-auto product-card">
        <div class="row justify-content-center align-items-center product-image-div">
          <img class="card-img-top product-image" src="/assets/images/products/product6.jpg" alt="Imagem do Produto">
        </div>
        <div class="card-body product-card-body">
          <h3 class="card-title">Short Moletom</h3>
          <p class="card-text">Short moletom com conforto e qualidade.</p>
          <p class="card-text">Tamanhos P e M.</p>
          <p class="card-text product-price">R$ 20,00</p>
          <div class="card-button w-100 text-center">
            <a class="btn btn-primary btn-round product-buy-button" href="https://www.instagram.com/male_version_store_oficial/" target="_blank">
              <i class="fa fa-instagram"></i>&nbsp;&nbsp; Faça seu Pedido
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card mx-auto product-card">
        <div class="row justify-content-center align-items-center product-image-div">
          <img class="card-img-top product-image" src="/assets/images/products/product7.jpg" alt="Imagem do Produto">
        </div>
        <div class="card-body product-card-body">
          <h3 class="card-title">Blusas</h3>
          <p class="card-text">Blusas para o cotidiano ou saídas básicas</p>
          <p class="card-text">Todos os tamanhos.</p>
          <p class="card-text product-price">R$ 29,90</p>
          <div class="card-button w-100 text-center">
            <a class="btn btn-primary btn-round product-buy-button" href="https://www.instagram.com/male_version_store_oficial/" target="_blank">
              <i class="fa fa-instagram"></i>&nbsp;&nbsp; Faça seu Pedido
            </a>
          </div>
        </div>
      </div>
    </div> --}}
  </div>
</div>
@endsection

@push('js')
    <script>
      function fillCatalog() {
        var mainDiv = document.getElementById('catalog-div');
        var requisitionContent = null;

        var ajaxRequisition = $.get('{{ route('api.product.list') }}', (data, status_string, jqxhr) => {
          requisitionContent = data;
        }).done(function() {
          console.log('Requisição Bem Sucedida');
          fillCatalogContent(requisitionContent, mainDiv);
        }).fail(function() {
          console.log('Falha na Requisição');
        }).always(function() {
          console.log('Requisição Concluída');
        });
      }

      function fillCatalogContent(requisitionContent, mainDiv) {
        if(Array.isArray(requisitionContent)){
          requisitionContent.forEach((info, index) => {
            var firstDIV = document.createElement('DIV');
            firstDIV.classList.add('col');

            var cardDIV = document.createElement('DIV');
            cardDIV.classList.add('card');
            cardDIV.classList.add('mx-auto');
            cardDIV.classList.add('product-card');

            var productImageDIV = document.createElement('DIV');
            productImageDIV.classList.add('row');
            productImageDIV.classList.add('justify-content-center');
            productImageDIV.classList.add('align-items-center');
            productImageDIV.classList.add('product-image-div');
            productImageDIV.innerHTML = '<img class="card-img-top product-image" src="'+ api_storage_url + info.storages[0].storage_id +'" alt="Imagem do Produto">';

            var cardBodyDIV = document.createElement('DIV');
            cardBodyDIV.classList.add('card-body');
            cardBodyDIV.classList.add('product-card-body');

            var productName = document.createElement('H3');
            productName.classList.add('card-title');
            productName.appendChild(document.createTextNode(info.name));

            var productDescription = document.createElement('P');
            productDescription.classList.add('card-text');
            productDescription.appendChild(document.createTextNode(info.description));

            var productSizes = document.createElement('P');
            productSizes.classList.add('card-text');
            productSizes.appendChild(document.createTextNode(formatProductSizesString(info.available_size)));

            var productValue = document.createElement('P');
            productValue.classList.add('card-text');
            productValue.classList.add('product-price');
            productValue.appendChild(document.createTextNode('R$ ' + info.value));

            var instagramDIV = document.createElement('DIV');
            instagramDIV.classList.add('card-button');
            instagramDIV.classList.add('w-100');
            instagramDIV.classList.add('text-center');
            instagramDIV.innerHTML = '<a class="btn btn-primary btn-round product-buy-button" href="https://www.instagram.com/male_version_store_oficial/" target="_blank"><i class="fa fa-instagram"></i>&nbsp;&nbsp; Faça seu Pedido</a>'

            cardBodyDIV.appendChild(productName);
            cardBodyDIV.appendChild(productDescription);
            cardBodyDIV.appendChild(productSizes);
            cardBodyDIV.appendChild(productValue);
            cardBodyDIV.appendChild(instagramDIV);

            cardDIV.appendChild(productImageDIV);
            cardDIV.appendChild(cardBodyDIV);

            firstDIV.appendChild(cardDIV);

            mainDiv.appendChild(firstDIV);         
          });

          document.getElementById('loading-div').style.display = "none";

          return true;
        } else {
          mainDiv.appendChild(document.createTextNode('Dados Inválidos'));

          return false;
        }
      }

    </script>
@endpush

@push('documentOnReady')
    fillCatalog();
@endpush