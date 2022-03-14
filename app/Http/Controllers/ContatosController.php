<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CriarContatoRequest;
use App\Http\Requests\AtualizarContatoRequest;
use App\Models\Contato;

class ContatoController extends Controller
{
    public function index()
    {
        $contatos = Contato::orderBy('nome', 'asc')
            ->get();

        return view('contatos.index')
            ->with('contatos', $contatos);
    }

    public function create()
    {
        return view('contatos.create');
    }

    public function store(CriarContatoRequest $request)
    {
        $validated = $request->validated();

        $contato = Contato::create($validated);

        return redirect()
            ->route('home')
            ->with('success', 'Contato adicionado com sucesso!');
    }

    public function show(Contato $contato)
    {
        return view('contatos.show')
            ->with('contato', $contato);
    }

    public function edit(Contato $contato)
    {
        return view('contatos.edit')
            ->with('contato', $contato);
    }

    public function update(AtualizarContatoRequest $request, Contato $contato)
    {
        $validated = $request->validated();

        $contato->fill($validated);
        $contato->save();

        return redirect()
            ->route('home')
            ->with('success', 'Contato atualizado com sucesso!');
    }

    public function destroy(Contato $contato)
    {
        $contato->delete();

        return redirect()
            ->route('home')
            ->with('success', 'Contato deletado com sucesso!');
    }
}