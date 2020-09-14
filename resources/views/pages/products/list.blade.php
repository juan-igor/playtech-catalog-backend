@extends('layouts.app_auth', ['activePage' => 'products', 'titlePage' => __('Listar Produtos'), 'title' => 'Listar Produtos'])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Listagem de Produtos</h4>
            <p class="card-category">Listagem dos produtos cadastrados no sistema</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    ID
                  </th>
                  <th>
                    Imagem
                  </th>
                  <th>
                    Produto
                  </th>
                  <th>
                    Valor
                  </th>
                  <th>
                    Ações
                  </th>
                </thead>
                <tbody id="product-list-tbody">
                </tbody>
              </table>
            </div>
            <div id="loading-div" class="row justify-content-center align-items-center" style="margin: 0; padding: 0;">
              <div class="loading-spinner-pulse">
                <div class="loading-bars bk-black">
                  <div></div>
                  <div></div>
                  <div></div>
                  <div></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
    <script>
      function fillProductList() {
        var tableBody = document.getElementById('product-list-tbody');
        var requisitionContent = null;

        var ajaxRequisition = $.get('{{ route('api.product.list') }}', (data, status_string, jqxhr) => {
          requisitionContent = data;
        }).done(function() {
          console.log('Requisição Bem Sucedida');
          fillTableBody(requisitionContent, tableBody);
        }).fail(function() {
          console.log('Falha na Requisição');
        }).always(function() {
          console.log('Requisição Concluída');
        });
      }

      function fillTableBody(requisitionContent, tableBody) {
        if(Array.isArray(requisitionContent)){
          requisitionContent.forEach((info, index) => {
            var row = document.createElement('TR');
            var product_id = document.createElement('TD');
            var product_image = document.createElement('TD');
            var product_name = document.createElement('TD');
            var product_value = document.createElement('TD');
            var actions = document.createElement('TD');

            actions.innerHTML = '<a rel="tooltip" style="margin-right: 5px;" class="btn btn-sm btn-info" href="{{ route('welcome') }}/produtos/editar/'+ info.id +'" target="_blank" data-original-title="" title=""><i class="material-icons">edit</i><div class="ripple-container"></div></a><a rel="tooltip" class="btn btn-sm btn-danger" href="#" data-original-title="" title=""><i class="material-icons">delete</i><div class="ripple-container"></div></a>'
            actions.classList.add('td-actions');

            product_image.innerHTML = '<img src="{{ route('welcome') }}/api/storage/view/'+ info.storages[0].storage_id +'" style="max-width: 100px" />';

            product_id.appendChild(document.createTextNode(info.id));
            product_name.appendChild(document.createTextNode(info.name));
            product_value.appendChild(document.createTextNode('R$ ' + info.value));   

            row.appendChild(product_id);
            row.appendChild(product_image);
            row.appendChild(product_name);
            row.appendChild(product_value);
            row.appendChild(actions);

            tableBody.appendChild(row);         
          });

          document.getElementById('loading-div').style.display = "none";

          return true;
        } else {
          tableBody.appendChild(document.createTextNode('Dados Inválidos'));

          return false;
        }
      }

    </script>
@endpush

@push('documentOnReady')
    fillProductList();
@endpush