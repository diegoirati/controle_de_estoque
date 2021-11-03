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
                        <form action="{{route('produto.salvar')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <label>Categoria do Produto</label>
                            <select class="form-control" name="categoria" id="categoria" required>
                                @foreach($categorias as $categoria)
                                    <option id="{{$categoria->id}}">{{$categoria->nome}}</option>
                                @endforeach
                            </select>
                            <label>Nome do Produto</label>
                            <input class="form-control" id="nome" name="nome" placeholder="Digite o nome da categoria"
                                   type="text" required>
                            <label>Quantidade</label>
                            <input class="form-control" id="quantidade" name="quantidade"
                                   placeholder="Digite a quantidade em estoque"
                                   type="number" required>

                            <label>Preço</label>
                            <input class="form-control" id="preco" name="preco"
                                   placeholder="Digite o preciso do produto"
                                   type="text" required>

                            <label>Descrição</label>
                            <textarea class="form-control" id="descricao" name="descricao"
                                      placeholder="Digite a descrição do categoria"
                                      type="text" required></textarea>

                            <label>Imagem</label>
                            <input class="form-control" id="imagem" name="imagem"
                                   type="file" required>
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
<style>
    label {
        margin-top: 20px !important;
    }

    textarea {
        margin-bottom: 25px !important;
    }
</style>
<script>
    window.setTimeout(function () {
        $(".alert").fadeTo(1500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 5000);
</script>
