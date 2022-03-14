@extends('layouts.default')

@section('title', 'Visualizar Contato')

@section('content')
    <a href="{{ route('contatos.edit', $contato) }}" class="btn btn-primary">Editar Contato</a>

    <div class="mb-3">
        <label for="nomeInput" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nomeInput" value="{{ $contato->nome }}" disabled>
    </div>

    <div class="mb-3">
        <label for="emailInput" class="form-label">Email</label>
        <input type="text" class="form-control" id="emailInput" value="{{ $contato->email }}" disabled>
    </div>

    <div class="mb-3">
        <label for="telefoneInput" class="form-label">Telefone</label>
        <input type="text" class="form-control" id="telefoneInput" value="{{ $contato->telefone }}" disabled>
    </div>

    <div class="mb-3">
        <label for="cepInput" class="form-label">CEP</label>
        <input type="text" class="form-control" id="cepInput" value="{{ $contato->cep }}" disabled>
    </div>

    <div class="mb-3">
        <label for="logradouroInput" class="form-label">Logradouro</label>
        <input type="text" class="form-control" id="logradouroInput" value="{{ $contato->logradouro }}" disabled>
    </div>

    <div class="mb-3">
        <label for="numeroInput" class="form-label">Número</label>
        <input type="text" class="form-control" id="numeroInput" value="{{ $contato->numero }}" disabled>
    </div>

    <div class="mb-3">
        <label for="bairroInput" class="form-label">Bairro</label>
        <input type="text" class="form-control" id="bairroInput" value="{{ $contato->bairro }}" disabled>
    </div>

    <div class="mb-3">
        <label for="cidadeInput" class="form-label">cidade</label>
        <input type="text" class="form-control" id="cidadeInput" value="{{ $contato->cidade }}" disabled>
    </div>

    <div class="mb-3">
        <label for="ufInput" class="form-label">UF</label>
        <input type="text" class="form-control" id="ufInput" value="{{ $contato->uf }}" disabled>
    </div>
@endsection