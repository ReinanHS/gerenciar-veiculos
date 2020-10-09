@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <p>Sistema Gerenciamento de Veículos - Cadastro</p>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('veiculos.new') }}">
                        @csrf
                        <div class="form-group">
                            <label for="placa-input">Placa</label>
                            <input type="text" class="form-control @error('placa') is-invalid @enderror" value="{{ old('placa') }}" name="placa" required autofocus id="placa-input" aria-describedby="placaHelp">
                            <small id="placaHelp" class="form-text text-muted">Digite a placa do veículo sem pontuação</small>
                            @error('placa')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="modelo-input">Modelo</label>
                            <input type="text" class="form-control @error('modelo') is-invalid @enderror" value="{{ old('modelo') }}" name="modelo" required id="modelo-input" aria-describedby="modeloHelp">
                            <small id="modeloHelp" class="form-text text-muted">Digite o modelo do veículo</small>
                            @error('modelo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="marca-input">Marca</label>
                            <input type="text" class="form-control @error('marca') is-invalid @enderror" value="{{ old('marca') }}" name="marca" required id="marca-input" aria-describedby="marcaHelp">
                            <small id="marcaHelp" class="form-text text-muted">Digite a marca do veículo</small>
                            @error('marca')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status-select">Status</label>
                            <select class="form-control" id="status-select" selected="{{ old('status') }}" name="status">
                                <option value="disponível">Disponível</option>
                                <option value="quebrado">Quebrado</option>
                                <option value="manutenção">Manutenção</option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="chassi-input">Chassi</label>
                            <input type="text" class="form-control @error('chassi') is-invalid @enderror" value="{{ old('chassi') }}" name="chassi" required id="chassi-input" aria-describedby="chassiHelp">
                            <small id="chassiHelp" class="form-text text-muted">Digite o chassi do veículo</small>
                            @error('chassi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                        <a href="{{ url('veiculos') }}" class="btn btn-secondary">Voltar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
