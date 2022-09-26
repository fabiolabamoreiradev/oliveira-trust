<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Cotações
        </h2>
    </x-slot>

    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-12 bg-white border-b border-gray-200 mx-auto py-6 px-4 sm:px-6 lg:px-8">

    @php $token = md5(now()); @endphp
    <form id="formulario" action="{{ url('cotacao-cadastrar', $token) }}" class="form-horizontal" data-parsley-validate="" name="formulario" action="taxa-editar" enctype="multipart/form-data" method="post" onSubmit="return validaDados()">
    
    <div class="form-group">
        <label for="" class="col-sm-2 control-label">
            Moeda de Origem: <b>BRL</b>
        </label>
    </div>
    <br/>
    <div class="form-group">
        <label for="" class="col-sm-2 control-label">
            Moeda de Destino:
            <span class="required">*</span>
        </label>
        <div class="col-sm-2">
            <select name="moeda_destino" id="moeda_destino" class="form-control" required="">
               <option value="">Selecione</option>
               <option value="USD">Dólar Americano</option>
               <option value="EUR">Euro</option>
               <option value="BTC">Bitcoin</option>
            </select>
        </div>
    </div>
    <br/>
    <div class="form-group">
        <label for="" class="col-sm-2 control-label">
            Valor para Conversão:
            <span class="required">*</span>
        </label>
        <div class="col-sm-2">
            <input type="text" autocomplete="off" onKeyUp="javascript:VerValorDigit(this);" size="15" maxlength="15" name="valor_conversao" id="valor_conversao" value="" class="form-control" required="">
        </div>
    </div>
    <br/>
    <div class="form-group">
        <label for="" class="col-sm-2 control-label">
            Forma de Pagamento:
            <span class="required">*</span>
        </label>
        <div class="col-sm-2">
            <select name="forma_pagamento" id="forma_pagamento" class="form-control" required="">
               <option value="">Selecione</option>
               <option value="Boleto">Boleto</option>
               <option value="Cartão de crédito">Cartão de crédito</option>            
            </select>
        </div>
    </div>
    
    <br/>
    <div class="form-group">
        <div class="col-sm-2">
            <x-primary-button class="ml-3" onClick="void(validaForm())">
                {{ __('Salvar') }}
            </x-primary-button>
        </div>
    </div>

</form>

<Script>
function validaForm() {
    /*
    if (!$('#moeda_destino').val()) {
        alert('Por favor, informe a moeda de destino');
        return false;
    }

    if (!$('#valor_conversao').val()) {
        alert('Por favor, informe o valor para conversão');
        return false;
    }

    if (!$('#forma_pagamento').val()) {
        alert('Por favor, informe a forma de pagamento');
        return false;
    }
    */
    $('#formulario').submit();

}
</script>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>