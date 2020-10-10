@extends('layouts.dashboard')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Tables</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a href="{{ route('veiculos.create') }}">Cadastrar veículos</a>.</p>
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
          <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-md-12">
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <list-vehiche :veiculos="{{ json_encode($veiculos) }}" route="{{ route('veiculos') }}"></list-vehiche>
                    {{ $veiculos->links() }}
                </div>
            </div>
          </div>
      </div>
    </div>
</div>
@endsection
