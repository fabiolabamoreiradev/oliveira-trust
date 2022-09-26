<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CotacaoModel;
use App\Models\TaxaModel;


class CotacaoController extends Controller
{
    public function listarCotacoes() 
    {
                
        $objCotacao = new CotacaoModel();

        $vetCotacoes = $objCotacao->listarCotacoes(array()); 

        return view('cotacoesListar')->with('vetCotacoes', $vetCotacoes);
    }

    public function cadastrarCotacoesForm() 
    {
        return view('cotacaoForm');
    }

    public function cadastrarCotacao() {
        $objCotacao = new CotacaoModel();
        $objCotacao->moeda_destino      = $_POST['moeda_destino'];
        $objCotacao->valor_conversao    = $_POST['valor_conversao'];
        $objCotacao->forma_pagamento    = $_POST['forma_pagamento'];

        $objCotacao->valor_conversao = str_replace('.', '',$objCotacao->valor_conversao);
        $objCotacao->valor_conversao = str_replace(',', '.',$objCotacao->valor_conversao);
        $objCotacao->valor_conversao = str_replace('R$', '',$objCotacao->valor_conversao);
        $objCotacao->valor_conversao = trim($objCotacao->valor_conversao);

        include(app_path() . '\servicos\API.php');

        $hashCotacoes = pegaCotacoes($objCotacao->moeda_destino);
        
        if ($objCotacao->moeda_destino == 'BTC') {
            $hashCotacoes[$objCotacao->moeda_destino]['compra'] = str_replace('.','',$hashCotacoes[$objCotacao->moeda_destino]['compra']);
        }
        
        $objCotacao->cotacao_moeda_destino = $hashCotacoes[$objCotacao->moeda_destino]['compra'];

        $objTaxa = new TaxaModel();

        $vetTaxas = $objTaxa->listarTaxas(array()); 

        if ($objCotacao->forma_pagamento == 'Boleto') {
            $objCotacao->taxa_pagamento = ($objCotacao->valor_conversao * $vetTaxas[0]->taxa_boleto)/100;
        } else {
            $objCotacao->taxa_pagamento = ($objCotacao->valor_conversao * $vetTaxas[0]->taxa_cartao_credito)/100;
        }

        if ($objCotacao->valor_conversao >= $vetTaxas[0]->valor_base) {
            $taxa = $vetTaxas[0]->taxa_acima_valor_base;
        } else {
            $taxa = $vetTaxas[0]->taxa_abaixo_valor_base;
        }

        $objCotacao->taxa_conversao = ($objCotacao->valor_conversao * $taxa)/100;


        $objCotacao->cadastra();

        return redirect('/cotacao-listar');
    }
}
