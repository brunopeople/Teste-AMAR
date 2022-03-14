@extends('layouts.default')

@section('title', 'Editar Contato')

@section('content')
    <form action="{{ route('contatos.update', $contato) }}" method="POST">
        @csrf
        @method("PUT")

        <div class="mb-3">
            <label for="nomeInput" class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror" id="nomeInput" value="{{ old('nome', $contato->nome) }}">
            @error('nome')
                <span class="invalid-feedback text-left" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="emailInput" class="form-label">Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="emailInput" value="{{ old('email', $contato->email) }}">
            @error('email')
                <span class="invalid-feedback text-left" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="telefoneInput" class="form-label">Telefone</label>
            <input type="text" name="telefone" class="form-control @error('telefone') is-invalid @enderror" id="telefoneInput" value="{{ old('telefone', $contato->telefone) }}">
            @error('telefone')
                <span class="invalid-feedback text-left" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="cepInput" class="form-label">CEP</label>
            <input type="text" name="cep" class="form-control" id="cepInput" maxlength="9" value="{{ old('cep', $contato->cep) }}">
        </div>
    
        <div class="mb-3">
            <label for="logradouroInput" class="form-label">Logradouro</label>
            <input type="text" name="logradouro" class="form-control" id="logradouroInput" value="{{ old('logradouro', $contato->logradouro) }}">
        </div>
    
        <div class="mb-3">
            <label for="numeroInput" class="form-label">Número</label>
            <input type="text" name="numero" class="form-control" id="numeroInput" value="{{ old('numero', $contato->numero) }}">
        </div>
    
        <div class="mb-3">
            <label for="bairroInput" class="form-label">Bairro</label>
            <input type="text" name="bairro" class="form-control" id="bairroInput" value="{{ old('bairro', $contato->bairro) }}">
        </div>
    
        <div class="mb-3">
            <label for="cidadeInput" class="form-label">cidade</label>
            <input type="text" name="cidade" class="form-control" id="cidadeInput" value="{{ old('cidade', $contato->cidade) }}">
        </div>
    
        <div class="mb-3">
            <label for="ufInput" class="form-label">UF</label>
            <input type="text" name="uf" class="form-control text-uppercase" maxlength="2" id="ufInput" value="{{ old('uf', $contato->uf) }}">
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>

    @push('scripts')
        <script type="text/javascript" src="{{ asset('js/busca_cep.js') }}"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $("#cepInput").busca_cep({
                    'logradouro': '#logradouroInput',
                    'bairro': '#bairroInput',
                    'localidade': '#cidadeInput',
                    'uf': '#ufInput'
                });
            });
        </script>
    @endpush
@endsection