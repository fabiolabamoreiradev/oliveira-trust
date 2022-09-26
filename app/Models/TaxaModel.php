<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TaxaModel extends Model
{
    use HasFactory;

    function listarTaxas($filtros) {

        $condicao = '';

        if (isset($filtros['id']) && $filtros['id']) {
            $vetTaxas = DB::table('taxas')->where('id', addslashes($filtros['id']))->first();

        } else {
            $vetTaxas = DB::table('taxas')->get();
        }        

        return $vetTaxas;
    }

    function altera() {

        foreach ($this as $chave => $valor) {
           
            if (is_array($valor)) {
                continue;
            }
           
            $this->$chave = trim($valor);
        }

        // Campos moeda
        foreach (array('taxa_boleto','taxa_cartao_credito','valor_base','taxa_acima_valor_base','taxa_abaixo_valor_base') as $valor) {
            
            if ($this->$valor) {
                $this->$valor = str_replace('.', '',$this->$valor);
                $this->$valor = str_replace(',', '.',$this->$valor);
                $this->$valor = str_replace('R$', '',$this->$valor);
                $this->$valor = trim($this->$valor);
            } else {
                $this->$valor = 0;
            }
        }

        DB::table('taxas')->where('id', $this->id)->update(['taxa_boleto' => $this->taxa_boleto,'taxa_cartao_credito'=>$this->taxa_cartao_credito,'valor_base'=>$this->valor_base,'taxa_acima_valor_base'=>$this->taxa_acima_valor_base,'taxa_abaixo_valor_base'=>$this->taxa_abaixo_valor_base]);

    }
}
