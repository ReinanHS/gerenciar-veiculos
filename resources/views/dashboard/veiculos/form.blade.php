@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-danger">
                            {{ session('message') }}
                        </div>
                    @endif

                    @error('placa')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    @if (Route::current()->getName() == 'veiculos.edit')
                        <form-vehiche route="{{ route('veiculos.update', $vehicle->placa) }}">
                            @csrf
                            @method('PUT')
                        </from-vehiche>
                    @else
                        <form-vehiche route="{{ route('veiculos.new') }}">
                            @csrf
                        </from-vehiche>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
