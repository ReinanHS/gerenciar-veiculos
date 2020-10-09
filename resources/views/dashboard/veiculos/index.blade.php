@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <p>Sistema Gerenciamento de Veículos</p>
                    <a class="btn btn-secondary">Cadastrar</a>
                </div>

                <div class="card-body">
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
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td class="d-flex">
                                <a class="btn btn-primary">Editar</a>
                                <a class="btn btn-secondary">Deletar</a>
                            </td>
                          </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
