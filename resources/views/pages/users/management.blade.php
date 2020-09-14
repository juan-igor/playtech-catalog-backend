@extends('layouts.app_auth', ['activePage' => 'user-management', 'titlePage' => __('Gerenciamento de Usuários'), 'title' => 'Gerenciar Usuários'])

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">Usuários</h4>
                <p class="card-category">Aqui você pode gerenciar os usuários do sistema</p>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-12 text-right">
                    <a href="/sistema/usuarios/criar" class="btn btn-sm btn-primary">
                      <i class="material-icons">person_add</i>&nbsp;
                      Adicionar Novo Usuário
                    </a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <tr>
                        <th>
                          Nome
                        </th>
                        <th>
                          Email
                        </th>
                        <th>
                          Data de Criação
                        </th>
                        <th class="text-right">
                          Ações
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($users as $user)
                      <tr>
                        <td>
                          {{ $user->name }}
                        </td>
                        <td>
                          {{ $user->email }}
                        </td>
                        <td>
                          {{ $user->created_at ?? 'Desconhecida' }}
                        </td>
                        <td class="td-actions text-right">
                          <a rel="tooltip" class="btn btn-sm btn-info" href="{{ "/sistema/usuarios/editar/".$user->id }}" target="_blank" data-original-title="" title="">
                            <i class="material-icons">edit</i>
                            <div class="ripple-container"></div>
                          </a>
                          <a rel="tooltip" class="btn btn-sm btn-danger" href="#" data-original-title="" title="">
                            <i class="material-icons">delete</i>
                            <div class="ripple-container"></div>
                          </a>
                        </td>
                      </tr>
                      @endforeach
                      </tbody>
                  </table>
                </div>
              </div>
              <div class="card-footer align-items-center justify-content-center">
                {{ $users->links() }}
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection