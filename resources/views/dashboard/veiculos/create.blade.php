@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                @if (Route::current()->getName() == 'veiculos.edit')
                <div class="card-header">
                    <p>Sistema Gerenciamento de Veículos - Editar veículo de placa {{ $vehicle->placa }}</p>
                </div>
                @else
                <div class="card-header">
                    <p>Sistema Gerenciamento de Veículos - Cadastro</p>
                </div>
                @endif

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-danger">
                            {{ session('message') }}
                        </div>
                    @endif

                    @if (Route::current()->getName() == 'veiculos.edit')
                    <form method="POST" action="{{ route('veiculos.update', $vehicle->placa) }}">
                    @method('PUT')
                    @else
                    <form method="POST" action="{{ route('veiculos.new') }}">
                    @endif
                        @csrf
                        <div class="form-group">
                            <label for="placa-input">Placa</label>
                            <input type="text" class="form-control @error('placa') is-invalid @enderror" value="{{ old('placa') ?? $vehicle->placa ?? '' }}" name="placa" required autofocus id="placa-input" aria-describedby="placaHelp">

                            @error('placa')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="modelo-input">Modelo</label>
                            <input type="text" class="form-control @error('modelo') is-invalid @enderror" value="{{ old('modelo') ?? $vehicle->modelo ?? '' }}" name="modelo" required id="modelo-input" aria-describedby="modeloHelp">

                            @error('modelo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="marca-input">Marca</label>
                            <input type="text" class="form-control @error('marca') is-invalid @enderror" value="{{ old('marca') ?? $vehicle->marca ?? '' }}" name="marca" required id="marca-input" aria-describedby="marcaHelp">

                            @error('marca')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status-select">Status</label>
                            <select class="form-control" id="status-select" selected="{{ old('status') ?? $vehicle->status ?? '' }}" name="status">
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
                            <input type="text" class="form-control @error('chassi') is-invalid @enderror" value="{{ old('chassi') ?? $vehicle->chassi ?? '' }}" name="chassi" required id="chassi-input" aria-describedby="chassiHelp">

                            @error('chassi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">
                        @if (Route::current()->getName() == 'veiculos.edit')
                        Editar
                        @else
                        Cadastrar
                        @endif
                        </button>
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Voltar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
