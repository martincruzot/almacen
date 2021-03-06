@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>
                    <span class="glyphicon glyphicon-shopping-cart"></span> Compras
                    <button class="btn btn-success pull-right" data-toggle="modal" data-target="#registerModal">
                        <span class="glyphicon glyphicon-save"></span> Registrar Compra
                    </button>
                </h2>
                <p class="text-info">En esta sección puedes registrar cada una de tus compras que realizas para
                    <strong>abastecer tu almacén</strong>.
                </p>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive ">

                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Fecha de Compra</th>

                            <th>Producto</th>
                            <th>Unidades</th>
                            <th>Precio Unitario</th>
                            <th>Total</th>
                            <th>Registrado</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($purchases as $purchase)
                                <tr>
                                    <td>
                                        @if(property_exists($purchase, 'purchased_at'))
                                            {{ $purchase->purchased_at->toDateString() }}
                                        @else
                                            {{ $purchase->created_at->toDateString() }}
                                        @endif
                                    </td>
                                    <td>{{ $purchase->product->name }}</td>
                                    <td>{{ $purchase->units }}</td>
                                    <td>s/ {{ number_format($purchase->price, 2, ',', ' ') }}</td>
                                    <td>s/ {{ number_format($purchase->units * $purchase->price, 2, ',', ' ') }}</td>
                                    <td>{{ ucfirst($purchase->created_at->diffForHumans()) }}</td>
                                    <td>
                                        <a href='#' class='text-danger' data-id='{{ $purchase->id }}'>
                                            <span class='glyphicon glyphicon-trash'></span> Eliminar
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <form id="destroy-form" action="{{ route('compras.destroy', ':id') }}" method="POST" style="display: none;">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
    </form>

    @include('purchases.modals.register')

@stop

@section('js-content')
    <script src="{{ asset('js/purchases.js') }}"></script>
@stop

@section('css-content')

@stop
