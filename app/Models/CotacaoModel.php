<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use DateTime;
date_default_timezone_set('America/Sao_Paulo');

class CotacaoModel extends Model
{
    use HasFactory;

    public $timestamps = true;

    function listarCotacoes($filtros) {

        $condicao = '';

        if (isset($filtros['id']) && $filtros['id']) {
            $vetCotacoes = DB::table('cotacoes')->where('id', addslashes($filtros['id']))->first();

        } else {
            $vetCotacoes = DB::table('cotacoes')->get();
        }        

        return $vetCotacoes;
    }

    function cadastra() {

        foreach ($this as $chave => $valor) {
           
            if (is_array($valor)) {
                continue;
            }
           
            $this->$chave = trim($valor);
        }

        $now = new DateTime(); 

        DB::table('cotacoes')->insert([
            'cd_usuario' => auth()->user()->id,
            'moeda_destino'=>addslashes($this->moeda_destino),
            'cotacao_moeda_destino'=>$this->cotacao_moeda_destino,
            'valor_conversao'=>$this->valor_conversao,
            'forma_pagamento'=>addslashes($this->forma_pagamento),
            'taxa_pagamento'=>$this->taxa_pagamento,
            'taxa_conversao'=>$this->taxa_conversao,
            'created_at'   => $now->format("Y-m-d H:i:s")
        ]);

    }
}
