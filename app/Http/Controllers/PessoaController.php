<?php
namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
    public function index(Request $request)
    {
        $query = Pessoa::with('enderecos'); // Eager load the enderecos relationship

        if ($request->has('id')) {
            $query->where('id', $request->id);
        }

        if ($request->has('nome')) {
            $query->where('nome', 'like', "%{$request->nome}%");
        }

        if ($request->has('cpf')) {
            $query->where('cpf', $request->cpf);
        }

        $pessoas = $query->get();

        return response()->json($pessoas);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome'  => 'required|string',
            'cpf'   => 'required|string|unique:pessoas',
            'email' => 'required|email|unique:pessoas',
        ]);

        $pessoa = Pessoa::create($request->all());

        return response()->json($pessoa, 201);
    }

    public function show($id)
    {
        $pessoa = Pessoa::with('enderecos')->findOrFail($id);

        return response()->json($pessoa);
    }

    public function update(Request $request, $id)
    {
        $pessoa = Pessoa::findOrFail($id);

        $pessoa->update($request->all());

        return response()->json($pessoa);
    }

    public function destroy($id)
    {
        $pessoa = Pessoa::findOrFail($id);
        $pessoa->delete();

        return response()->json(['message' => 'Pessoa excluída com sucesso']);
    }
}