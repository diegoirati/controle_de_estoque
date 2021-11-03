@extends('layouts.app')

@section('content')
    <div class=" container row">
        <input class="form-control col mr-3 ml-4" placeholder="Digite seu nome">
        <input class="form-control col" placeholder="Digite seu telefone">
        <h1 class="col-6">{{ $cidade }}</h1>
    </div>

    <div class="row" style="margin-left: 25px; margin-right: 25px;">
        @foreach($produtos as $produto)
            <div class="col">
                <div class="card">
                    @if($produto->image_name === null)
                        <img class="img-responsive" src="{{ url('imagens/image.gif') }}" alt="Image" style="width:100%">
                    @else
                        <img class="img-responsive" src="{{ url('uploads/'.$produto->image_name) }}" alt="Image"
                             style="width:100%">
                    @endif
                    <h1> {{ $produto->nome }}</h1>
                    <p class="price">{{ $produto->preco }}</p>
                    <p>
                        {{ $produto->descricao }}
                    </p>
                    <p>
                        Quantidade: {{ $produto->quantidade }}
                    </p>

                    <button>Adicionar ao carrinho</button>
                </div>
            </div>
        @endforeach
    </div>
@endsection
<style>
    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        max-width: 300px;
        margin: auto;
        text-align: center;
        font-family: arial;
    }

    .price {
        color: grey;
        font-size: 22px;
    }

    .card button {
        border: none;
        outline: 0;
        padding: 12px;
        color: white;
        background-color: #000;
        text-align: center;
        cursor: pointer;
        width: 100%;
        font-size: 18px;
        bottom: 0 !important;
    }

    .card button:hover {
        opacity: 0.7;
    }
</style>
