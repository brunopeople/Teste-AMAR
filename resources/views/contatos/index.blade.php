@extends('layouts.default')

@section('title', 'Lista de Contatos')

@section('content')
    <a href="{{ route('contatos.create') }}" class="btn btn-primary">Novo Contato</a>

    <table class="table">
        <thead>
            <tr>
                <th>Contato ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($contatos as $contato)
                <tr>
                    <td>{{ $contato->id }}</td>
                    <td>{{ $contato->nome }}</td>
                    <td>{{ $contato->email }}</td>
                    <td>{{ $contato->telefone }}</td>
                    <td>
                        <a href="{{ route('contatos.show', $contato) }}" class="btn btn-sm btn-success">Visualizar</a>
                        <a href="{{ route('contatos.edit', $contato) }}" class="btn btn-sm btn-info">Editar</a>
                        <form action="{{ route('contatos.destroy', $contato) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method("DELETE")
                            <input type="submit" class="btn btn-sm btn-danger" value="Deletar">
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="5">Nenhum registro para exibir</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection