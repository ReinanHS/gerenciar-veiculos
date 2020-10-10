@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <p>Sistema Gerenciamento de Veículos</p>
                    <a href="{{ route('veiculos.create') }}" class="btn btn-secondary">Cadastrar</a>
                </div>

                <div class="card-body">
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
@endsection
