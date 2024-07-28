<?php
namespace App\Http\Controllers;

use App\Models\Endereco;
use App\Models\EnderecoHistorico;
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'pessoa_id'  => 'required|exists:pessoas,id',
            'tipo'       => 'required|string',
            'cep'        => 'required|string',
            'logradouro' => 'required|string',
            'numero'     => 'required|string',
            'bairro'     => 'required|string',
            'estado'     => 'required|string',
            'cidade'     => 'required|string',
        ]);

        $endereco = Endereco::create($request->all());

        // Save to historico
        EnderecoHistorico::create([
            'endereco_id' => $endereco->id,
            'tipo'        => $endereco->tipo,
            'cep'         => $endereco->cep,
            'logradouro'  => $endereco->logradouro,
            'numero'      => $endereco->numero,
            'bairro'      => $endereco->bairro,
            'estado'      => $endereco->estado,
            'cidade'      => $endereco->cidade,
            'pessoa_id'   => $endereco->pessoa_id,
        ]);

        return response()->json($endereco, 201);
    }

    public function update(Request $request, $id)
    {
        $endereco = Endereco::findOrFail($id);

        $endereco->update($request->all());

        // Save to historico
        //EnderecoHistorico::create([
        //    'endereco_id' => $endereco->id,
        //    'tipo'        => $endereco->tipo,
        //    'cep'         => $endereco->cep,
        //    'logradouro'  => $endereco->logradouro,
        //    'numero'      => $endereco->numero,
        //    'bairro'      => $endereco->bairro,
        //    'estado'      => $endereco->estado,
        //    'cidade'      => $endereco->cidade,
       // ]);

        return response()->json($endereco);
    }

    public function listHistoricoById($id)
    {
        $historico = EnderecoHistorico::where('endereco_id', $id)->get();

        return response()->json($historico);
    }
}
