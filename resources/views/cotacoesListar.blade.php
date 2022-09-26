<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cotações') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-12 bg-white border-b border-gray-200">
                
                <div class="flex items-center justify-center mt-4">
                    <x-primary-button class="ml-3" onClick="window.location.href = '/cotacao-cadastrar'">
                        {{ __('Efetuar Cotação') }}
                    </x-primary-button>
                </div>
                <br/>

                <table class="listagem">
                    <thead>
                    <tr>
                        <th align="center"><b>Data</b></th>
                        <th align="center"><b>Hora</b></th>
                        <th align="center"><b>Moeda Destino</b></th>
                        <th align="center"><b>Valor Conversão</b></th>
                        <th align="center"><b>Forma Pagamento</b></th>
                        <th align="center"><b>Cotação Moeda Destino</b></th>
                        <th align="center"><b>Taxa Pagamento</b></th>
                        <th align="center"><b>Taxa Conversão</b></th>
                    </tr>
                    </thead>                    

                    @if (isset($vetCotacoes) && $vetCotacoes)

                        @for ($i=0;$i<count($vetCotacoes);$i++)
                            <tr>
                            <td align="center">{{substr($vetCotacoes[$i]->created_at,8,2) . '/' . substr($vetCotacoes[$i]->created_at,5,2) . '/' . substr($vetCotacoes[$i]->created_at,0,4)}}</td>
                            <td align="center">{{substr($vetCotacoes[$i]->created_at,11,5)}}</td>
                            <td align="center">{{$vetCotacoes[$i]->moeda_destino}}</td>
                            <td align="right">{{number_format($vetCotacoes[$i]->valor_conversao,2,',','.')}}</td>
                            <td align="center">{{$vetCotacoes[$i]->forma_pagamento}}</td>
                            <td align="right">{{number_format($vetCotacoes[$i]->cotacao_moeda_destino,2,',','.')}}</td>
                            <td align="right">{{number_format($vetCotacoes[$i]->taxa_pagamento,2,',','.')}}</td>
                            <td align="right">{{number_format($vetCotacoes[$i]->taxa_conversao,2,',','.')}}</td>    
                            </tr>
                        @endfor
                    @endif

                </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>