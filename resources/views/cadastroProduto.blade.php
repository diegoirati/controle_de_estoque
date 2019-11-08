@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">CADASTRO DE PRODUTO</div>
                    @if(isset($Ok))
                        <div class="alert alert-success" role="alert" align="center">
                            {{ $Ok }}

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                    @endif
                    @if(isset($NotOk))
                        <div class="alert alert-danger" role="alert" align="center">
                            {{ $NotOk }}

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{route('produto.salvar')}}" method="post">
                            @csrf
                            <label>Categoria do Produto</label>
                            <select class="form-control" name="categoria" id="categoria">
                                @foreach($categorias as $categoria)
                                    <option id="{{$categoria->id}}">{{$categoria->nome}}</option>
                                @endforeach
                            </select>
                            <label>Nome do Produto</label>
                            <input class="form-control" id="nome" name="nome" placeholder="Digite o nome da categoria"
                                   type="text">
                            <label>Quantidade</label>
                            <input class="form-control" id="quantidade" name="quantidade"
                                   placeholder="Digite o nome da categoria"
                                   type="text">
                            <br>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
<script>
    window.setTimeout(function () {
        $(".alert").fadeTo(1500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 5000);
</script>
