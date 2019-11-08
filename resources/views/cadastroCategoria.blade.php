@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">CADASTRO DE CATEGORIAS</div>
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
                        <form action="{{route('categoria.salvar')}}" method="post">
                            @csrf
                            <label>Nome da Categoria</label>
                            <input class="form-control" id="nome" name="nome" placeholder="Digite o nome da categoria"
                                   type="text">
                            <br>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">CATEGORIA JÁ CADASTRADAS</div>
                    <table class="table table-striped table-bordered table-hover" id="table_disciplines">
                        <tr>
                            <thead>
                            <th scope="col" width="3%">ID</th>
                            <th scope="col" width="97%" >NOME</th>
                            </thead>
                        </tr>
                        <tbody>
                        @foreach($categorias as $categoria)
                            <tr>
                                <td>{{ $categoria->id }}</td>
                                <td>{{ $categoria->nome }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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
