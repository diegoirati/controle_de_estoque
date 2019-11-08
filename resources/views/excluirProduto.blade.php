@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card">


                        <div class="card-header">EXCLUSÃO DE PRODUTO</div>
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
                        <form method="post" action="{{route('produto.excluir')}}">
                            @csrf
                            <table class="table" id="table_disciplines">

                                <tr>
                                    <thead>
                                    <th scope="col" width="16.6666666667%">ID</th>
                                    <th scope="col" width="16.6666666667%">CATEGORIA</th>
                                    <th scope="col" width="16.6666666667%">NOME</th>
                                    <th scope="col" width="16.6666666667%">QUANTIDADE</th>
                                    <th scope="col" width="16.6666666667%">ATUALIZADO EM</th>
                                    <th scope="col" width="16.6666666667%">EXCLUIR</th>
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

                                        <td><input type="checkbox" name="{{$produto->id}}"
                                                   id="{{ $produto->id }}">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <br>
                            <button type="submit" class="btn btn-danger">Excluir</button>
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
