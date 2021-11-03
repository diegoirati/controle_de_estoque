@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">ESTOQUE</div>
                    <div class="card">
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
                                <th scope="col" width="20%">PREÇO</th>
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
                                    <td>{{ $produto->preco }}</td>
                                    <td>{{ $produto->nome }}</td>
                                    <td>{{ $produto->quantidade }}</td>
                                    <td>{{ $produto->updated_at }}</td>
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
