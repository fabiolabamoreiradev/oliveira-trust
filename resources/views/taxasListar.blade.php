<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Taxas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-12 bg-white border-b border-gray-200">
                <table class="listagem">
                    <thead>
                        <tr>
                            <td align="center"><b>Taxa Boleto</b></td>
                            <td align="center"><b>Taxa Cartão</b></td>
                            <td align="center"><b>Valor Base</b></td>
                            <td align="center"><b>Taxa Acima do Valor Base</b></td>
                            <td align="center"><b>Taxa Abaixo do Valor Base</b></td>
                        </tr>
                    </thead>                    

                    @if (isset($vetTaxas) && $vetTaxas)

                        @for ($i=0;$i<count($vetTaxas);$i++)
                            <tr>
                            <td align="center">{{$vetTaxas[$i]->taxa_boleto}}</td>
                            <td align="center">{{$vetTaxas[$i]->taxa_cartao_credito}}</td>
                            <td align="center">{{$vetTaxas[$i]->valor_base}}</td>
                            <td align="center">{{$vetTaxas[$i]->taxa_acima_valor_base}}</td>
                            <td align="center">{{$vetTaxas[$i]->taxa_abaixo_valor_base}}</td>
                            <td align="center">
                                <a href="/taxa-editar?id={{$vetTaxas[$i]->id}}"><i class="material-icons icone">edit</i> editar</a>
                            </td>
                            </tr>
                        @endfor
                    @endif

                </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>