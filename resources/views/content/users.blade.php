@extends('layout.app')

@section('vendor')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') }}">
@endsection

@extends('layout.menu')

@section('content')

  <div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
      <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
          <div class="col-12">
            <h2 class="content-header-title float-start mb-0">Usuários</h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a>
                </li>
                <li class="breadcrumb-item active">Lista completa de usuários
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content-header-right text-md-end col-md-3 col-12 d-md-block">
        <div class="mb-1 breadcrumb-right">
          <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="modal" data-bs-target="#modals-slide-in">
            Adicionar Novo
          </button>
        </div>
      </div>
    </div>

    <div class="content-body">
      
      <div class="row" id="">
        <div class="col-12">
          <div class="card">

            {{-- Lista de Usuários --}}
            <div class="table-responsive">

              <table class="table" id="export_table" cols="1-2-3">
                <thead class="table-dark">
                  <tr>
                    <th>Nome completo</th>
                    <th>E-mail</th>
                    <th>Tipo de Conta</th>
                    <th class="text-end"></th>
                  </tr>
                </thead>
                <tbody>
                  {{-- @foreach($data_view as $row)
                  <tr id="Liste-{{$row->id}}">
                    <td class="text-bold-500">{{ $row->name }} {{ $row->lastname }}</td>
                    <td class="text-bold-500">{{ $row->email }}</td>
                    <td class="text-bold-500">{{ $row->groupName }}</td>

                    <td class="text-end">
                      <a href="#" class="btn btn-primary waves-effect btn-sm">
                        Editar
                      </a>

                      <a class="btn btn-danger waves-effect btn-sm" onclick="confirmDelete('#', 'Liste-{{ $row->id }}')">
                        <div class="spinner-grow d-none" role="status" id="spiner-Liste-{{ $row->id }}" style="width: 1rem; height: 1rem;"></div>
                        <i class="far fa-trash-alt"></i>
                      </a>
                    </td>
                  </tr>
                  @endforeach --}}
                </tbody>
              </table>

            </div>
            {{-- Fim Lista de Usuários --}}

            {{-- Modal de Add Usuários --}}
            <div class="modal modal-slide-in new-user-modal fade" id="modals-slide-in">
              <div class="modal-dialog">
                <form action="#" class="modal-content" method="post">
                  @csrf
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                  <div class="modal-header mb-1">
                    <h5 class="modal-title" id="exampleModalLabel">Novo Cadastro</h5>
                  </div>
                  <div class="modal-body flex-grow-1">

                    <div class="mb-1">
                      <label class="form-label" for="basic-icon-default-fullname">Nome</label>
                      <input type="text" class="form-control dt-full-name" id="basic-icon-default-fullname" name="name" />
                    </div>

                    <div class="mb-1">
                      <label class="form-label" for="basic-icon-default-email">Email</label>
                      <input type="text" id="basic-icon-default-email" class="form-control dt-email" name="email" />
                    </div>

                    <div class="mb-1">
                      <label class="form-label" for="passWord">Senha</label>
                      <input type="password" id="passWord" class="form-control dt-password" name="password" />
                    </div>

                    <div class="mb-1">
                      <label class="form-label" for="passWord">Telefone Principal (WhatsApp)</label>
                      <input type="text" class="form-control" name="tel_principal" />
                    </div>

                    <div class="mb-md-5">
                      <p class="form-label pb-1" for="type-count">Tipo de conta:</p>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="id_grouppermissions" id="free" value="2" checked>
                        <label class="form-check-label" for="free">Client</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="id_grouppermissions" id="trial" value="1" >
                        <label class="form-check-label" for="trial">Administrador</label>
                      </div>
                    </div>

                    <button type="submit" class="btn btn-primary me-1">Adicionar</button>
                  </div>
                </form>
              </div>
            </div>
            {{-- Fim modal --}}

          </div>
        </div>
      </div>

    </div>
  </div>

@endsection

@section('scripts')
<script src="{{ asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/jszip.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.print.min.js') }}"></script>

<script src="{{ asset('js/tableexport.js') }}"></script>

@endsection


