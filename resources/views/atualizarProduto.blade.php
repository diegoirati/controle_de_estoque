@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">CATEGORIAS SALVAS</div>
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
                    <table class="table table-striped table-bordered table-hover" id="table_disciplines">
                        <tr>
                            <thead>
                            <th scope="col" width="20%">ID</th>
                            <th scope="col" width="20%">CATEGORIA</th>
                            <th scope="col" width="20%">NOME</th>
                            <th scope="col" width="20%">QUANTIDADE</th>
                            <th scope="col" width="20%">ATUALIZADO EM</th>
                            </thead>
                        </tr>
                        <tbody>
                        @foreach($produtos as $produto)
                            <tr>
                                <td>{{ $produto->id }}</td>
                                <td>{{ ($produto->categoria)->nome }}</td>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->quantidade }}</td>
                                <td>{{ $produto->updated_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <br>

                <div class="card">
                    <div class="card-header">ATUALIZAR PRODUTO</div>
                    <div class="container">
                        <form action="{{route('produto.atualizar')}}" method="post">
                            @csrf
                            <br>
                            <label>ID da categoria</label>
                            <input class="form-control" id="id" name="id"
                                   placeholder="Digite ID do produto que quer alterar"
                                   type="number">
                            <br>
                            <label>Valor da atualização</label>
                            <input class="form-control" id="valor" name="valor"
                                   placeholder="Digite valor para atualizar a quantidade"
                                   type="number">
                            <br>

                            <button type="submit" class="btn btn-primary">Atualizar</button>
                        </form>
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
