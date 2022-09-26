<?php
use Illuminate\Support\Facades\Http;

function pegaCotacoes($moeda = null) {
    
    if ($moeda) {
        $url = 'http://economia.awesomeapi.com.br/json/last/' . $moeda . '-BRL';
    } else {
        $url = 'http://economia.awesomeapi.com.br/json/last/USD-BRL,EUR-BRL,BTC-BRL';
    }
    
    $resultado = Http::timeout(50)->asForm()->get($url);
    
    //$resultado = Http::timeout(100)->get($url);
    if (!$resultado) {
        return;
    }

    $obj = json_decode($resultado,true);

    foreach ($obj as $chave => $valor) {
        
        $retorno[$obj[$chave]['code']]['nome']     = $obj[$chave]['name'];
        $retorno[$obj[$chave]['code']]['minimo']   = $obj[$chave]['low'];
        $retorno[$obj[$chave]['code']]['maximo']   = $obj[$chave]['high'];
        $retorno[$obj[$chave]['code']]['compra']   = $obj[$chave]['bid'];
        $retorno[$obj[$chave]['code']]['venda']    = $obj[$chave]['ask'];
        $retorno[$obj[$chave]['code']]['variacao'] = $obj[$chave]['varBid'];
        $retorno[$obj[$chave]['code']]['porcentagem_variacao'] = $obj[$chave]['pctChange'];
    }
    
    return $retorno;    
}
?>