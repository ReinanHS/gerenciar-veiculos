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
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Placa</th>
                            <th scope="col">Modelo</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Status</th>
                            <th scope="col">Chassi</th>
                            <th scope="col">Ações</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($veiculos as $veiculo)
                          <tr>
                            <th scope="row">{{ $veiculo->placa }}</th>
                            <td>{{ $veiculo->modelo }}</td>
                            <td>{{ $veiculo->marca }}</td>
                            <td>{{ mb_convert_case($veiculo->status, MB_CASE_TITLE, 'UTF-8') }}</td>
                            <td>{{ $veiculo->chassi }}</td>
                            <td class="d-flex">
                                <a href="{{ route('veiculos.edit', $veiculo->placa) }}" class="btn btn-primary">Editar</a>
                                <a href="{{ url('veiculos/' . $veiculo->id) }}" class="btn btn-secondary">Deletar</a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                    </table>
                    {{ $veiculos->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
