<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    



@if (isset($hashCotacoes['USD']['minimo']) && $hashCotacoes['USD']['minimo'])
<div class="cotacao-linha">
    <div class="cotacao dolar">
        <span class="material-symbols-outlined">attach_money</span> USD-BRL
        <ul class="center-content nav nav-justified">
        <li>
            <h4>
            <span class="material-symbols-outlined minimo">expand_more</span>
            {{$hashCotacoes['USD']['minimo']}}
            </h4>
        </li>
        <li>
            <h4>
            <span class="material-symbols-outlined maximo">expand_less</span>
            {{$hashCotacoes['USD']['maximo']}}
            </h4>
        </li>
        </ul>
    </div>
@endif

@if (isset($hashCotacoes['EUR']['minimo']) && $hashCotacoes['EUR']['minimo'])
    <div class="cotacao euro">
        <span class="material-symbols-outlined">euro</span> EUR-BRL
        <ul class="center-content nav nav-justified">
        <li>
            <h4>
            <span class="material-symbols-outlined minimo">expand_more</span>
            {{$hashCotacoes['EUR']['minimo']}}
            </h4>
        </li>
        <li>
            <h4>
            <span class="material-symbols-outlined maximo">expand_less</span>
            {{$hashCotacoes['EUR']['maximo']}}
            </h4>
        </li>
        </ul>
    </div>
@endif

@if (isset($hashCotacoes['BTC']['minimo']) && $hashCotacoes['BTC']['minimo'])
    <div class="cotacao bitcoin">
        <span class="material-symbols-outlined">currency_bitcoin</span> BTC-BRL
        <ul class="center-content nav nav-justified">
        <li>
            <h4>
            <span class="material-symbols-outlined minimo">expand_more</span>
            {{$hashCotacoes['BTC']['minimo']}}
            </h4>
        </li>
        <li>
            <h4>
            <span class="material-symbols-outlined maximo">expand_less</span>
            {{$hashCotacoes['BTC']['maximo']}}
            </h4>
        </li>
        </ul>
    </div>
@endif    

</div>









                </div>
            </div>
        </div>
    </div>
</x-app-layout>
