<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Taxas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-12 bg-white border-b border-gray-200 mx-auto py-6 px-4 sm:px-6 lg:px-8">
    @if (isset($vetTaxas->msgSucesso) && $vetTaxas->msgSucesso)
        <div class="sucesso">{{$vetTaxas->msgSucesso}}</div>
    @endif


    @php $token = md5(now()); @endphp
    <form id="formulario" action="{{ url('taxa-editar', $token) }}" class="form-horizontal" data-parsley-validate="" name="formulario" action="taxa-editar" enctype="multipart/form-data" method="post">
    <input type="hidden" name="id" id="id" value="{{$vetTaxas->id}}">
    
    <div class="form-group">
        <label for="" class="col-sm-2 control-label">
            Taxa Boleto:
            <span class="required">*</span>
        </label>
        <div class="col-sm-2">
            <input type="text" autocomplete="off" name="taxa_boleto" id="taxa_boleto" onKeyUp="javascript:VerValorDigit(this);" size="15" maxlength="15" value="{{number_format($vetTaxas->taxa_boleto,2,',','.')}}" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label for="" class="col-sm-2 control-label">
            Taxa Cartão de Crédito:
            <span class="required">*</span>
        </label>
        <div class="col-sm-2">
            <input type="text" autocomplete="off" name="taxa_cartao_credito" id="taxa_cartao_credito" onKeyUp="javascript:VerValorDigit(this);" size="15" maxlength="15" value="{{number_format($vetTaxas->taxa_cartao_credito,2,',','.')}}" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label for="" class="col-sm-2 control-label">
            Valor Base:
            <span class="required">*</span>
        </label>
        <div class="col-sm-2">
            <input type="text" autocomplete="off" name="valor_base" id="valor_base" onKeyUp="javascript:VerValorDigit(this);" size="15" maxlength="15" value="{{number_format($vetTaxas->valor_base,2,',','.')}}" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label for="" class="col-sm-2 control-label">
            Taxa Acima do Valor Base:
            <span class="required">*</span>
        </label>
        <div class="col-sm-2">
            <input type="text" autocomplete="off" name="taxa_acima_valor_base" id="taxa_acima_valor_base" onKeyUp="javascript:VerValorDigit(this);" size="15" maxlength="15" value="{{number_format($vetTaxas->taxa_acima_valor_base,2,',','.')}}" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label for="" class="col-sm-2 control-label">
            Taxa Abaixo do Valor Base:
            <span class="required">*</span>
        </label>
        <div class="col-sm-2">
            <input type="text" autocomplete="off" name="taxa_abaixo_valor_base" id="taxa_abaixo_valor_base" onKeyUp="javascript:VerValorDigit(this);" size="15" maxlength="15" value="{{number_format($vetTaxas->taxa_abaixo_valor_base,2,',','.')}}" class="form-control">
        </div>
    </div>
        
    <br/>
     <div class="form-group">
        <div class="col-sm-2">

        </div>

        <a href="javascript:void(validaForm())">
        <i class="material-icons icone">check</i> Salvar
        </a>

    </div>

</form>

<Script>
function validaForm() {

    if (!$('#taxa_boleto').val()) {
        alert('Por favor, informe a taxa do boleto');
        return false;
    }

    if (!$('#taxa_cartao_credito').val()) {
        alert('Por favor, informe a taxa do cartão de crédito');
        return false;
    }

    if (!$('#valor_base').val()) {
        alert('Por favor, informe o valor base');
        return false;
    }

    if (!$('#taxa_acima_valor_base').val()) {
        alert('Por favor, informe a taxa acima do valor base');
        return false;
    }

    if (!$('#taxa_abaixo_valor_base').val()) {
        alert('Por favor, informe a taxa abaixo do valor base');
        return false;
    }

    $('#formulario').submit();

}
</script>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>