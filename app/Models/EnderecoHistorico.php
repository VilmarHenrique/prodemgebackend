<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnderecoHistorico extends Model
{
    use HasFactory;

    protected $fillable = [
        'endereco_id', 'tipo', 'cep', 'logradouro', 'numero', 'bairro', 'estado', 'cidade', 'pessoa_id'
    ];

    public function endereco()
    {
        return $this->belongsTo(Endereco::class);
    }
}