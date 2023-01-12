@extends('layouts.app')

@section('titulo', 'Dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('flash-messages.flash')
                <div class="card">
                    <div class="card-header">{{ __('Productos') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="col-12 text-center pb-5">
                            <h1>Bienvenido, {{ Auth::user()->name }}</h1>
                        </div>

                        @if(Auth::user()->is_Admin())
                            <a href="{{ route('generar.facturas') }}" class="btn btn-success" role="button" data-bs-toggle="button">Generar facturas</a>
                        @else 
                             {{-- Formulario de Compra --}}
                            <form class="row row-cols-lg-auto g-3 align-items-center justify-content-center" action="{{ route('store.compra') }}" method="POST">
                                @csrf
                                <div class="col-12">
                                    <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                                    <select class="form-select" name="product_id" id="inlineFormSelectPref">
                                        <option selected>Seleccione...</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }} - {{ $product->price }}</option>    
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Comprar</button>
                                </div>
                            </form>
                            {{-- Formulario de Compra --}}
                        @endif
                       
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
