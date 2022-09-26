<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaxaModel;

class TaxaController extends Controller
{
    public function listarTaxas() 
    {
                
        $objTaxa = new TaxaModel();

        $vetTaxas = $objTaxa->listarTaxas(array()); 

        //dd($vetTaxas);
        return view('taxasListar')->with('vetTaxas', $vetTaxas);
        //return view('dashboard');
    }

    public function editarTaxasForm() 
    {
                
        $objTaxa = new TaxaModel();

        $vetTaxas = $objTaxa->listarTaxas(array('id'=>$_GET['id'])); 

        return view('taxaForm')->with('vetTaxas', $vetTaxas);
        
    }

    public function editarTaxas(Request $request) 
    {
                
        $objTaxa = new TaxaModel();
        $objTaxa->id                     = $_POST['id'];
        $objTaxa->taxa_boleto            = $_POST['taxa_boleto'];
        $objTaxa->taxa_cartao_credito    = $_POST['taxa_cartao_credito'];
        $objTaxa->valor_base             = $_POST['valor_base'];
        $objTaxa->taxa_acima_valor_base  = $_POST['taxa_acima_valor_base'];
        $objTaxa->taxa_abaixo_valor_base = $_POST['taxa_abaixo_valor_base'];

        $objTaxa->altera();
        $objTaxa->msgSucesso = 'Alteração efetuada com sucesso';

        return view('taxaForm')->with('vetTaxas', $objTaxa);
        
    }

    

    
}
