<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>
            {{ in_array($produto->familia->nome, ['FortBeef', 'FortLac']) ? $produto->nome : 'FortMix ' . $produto->nome }}
        </title>
        <style>
            @page {
                margin: 5mm;
            }
            @font-face {
                font-family: 'Prompt';
                src: url('{{ public_path('storage/fonts/Prompt-Regular.ttf') }}') format('truetype');
                font-weight: normal;
                font-style: normal;
            }
            @font-face {
                font-family: 'Prompt';
                src: url('{{ public_path('storage/fonts/Prompt-Bold.ttf') }}') format('truetype');
                font-weight: bold;
                font-style: normal;
            }
            body {
                font-family: 'Prompt', Arial, sans-serif;
                margin: 0;
                color: #333333;
                line-height: 1.5;
            }
            .container {
                width: 100%;
                padding: 0;
            }
            .header {
                text-align: center;
                margin-bottom: 10px;
            }
            .header img {
                height: 100px;
                width: auto;
            }
            .header h1 {
                font-size: 2em;
                font-weight: bold;
            }
            .section {
                margin-bottom: 10px;
            }
            .section h2 {
                text-align: center;
                vertical-align: middle;
                background-color: #900;
                color: #fff;
                padding: 5px;
                font-size: 1.5em;
                margin-bottom: 5px;
            }
            .section p {
                text-align: justify;
                padding: 0 10% 0 10%;
            }
            .layout-table {
                width: 100%;
                table-layout: fixed;
                border-collapse: collapse;
            }
            .layout-table td {
                vertical-align: top;
                padding: 10px;
            }
            .col-left {
                width: 40%; /* Proporção para a sacaria */
            }
            .col-left img {
                max-width: 100%;
                height: auto;
            }
            .col-right {
                width: 60%; /* Proporção para a tabela */
            }
            .nutrient-title {
                font-weight: 600;
                font-size: 1em;
                text-align: center;
                padding: 5px;
                background-color: #900;
                color: #fff;
            }
            .table {
                width: 100%;
                border-collapse: collapse;
                font-size: 0.8em;
            }
            .table th, .table td {
                border: 1px solid #ddd;
                padding: 5px;
                text-align: left;
            }
            .table th {
                background-color: #f5f5f5;
                text-align: center;
            }
        </style>
        <style>
            .icons-container {
                margin-bottom: 20px;
                text-align: center;
            }

            .icon-group h3 {
                font-size: 1.2em;
                margin-bottom: 10px;
                font-weight: bold;
                color: #333;
            }

            .icons-table {
                width: 100%;
                margin: 0 auto;
                border-collapse: collapse;
            }

            .icon-item {
                text-align: center;
                padding: 10px;
                vertical-align: top;
            }

            .icon-item img {
                height: 50px;
                width: auto;
                margin-bottom: 5px;
            }

            .icon-item p {
                margin: 0;
                font-size: 0.8em;
                color: #333;
            }
        </style>

    </head>
    <body>
        <div class="container">
            <!-- Ícone do Produto -->
            <div class="header">
                <img src="{{ public_path('storage/' . $produto->icone) }}" alt="Produto">
                <h1>
                    {{ in_array($produto->familia->nome, ['FortBeef', 'FortLac']) ? $produto->nome : 'FortMix ' . $produto->nome }}
                </h1>
            </div>

            <!-- Indicação de Uso -->
            <div class="section">
                <h2>Indicações de Uso</h2>
                <p>{{ $produto->indicacao_uso }}</p>
            </div>

            <!-- Modo de Uso -->
            <div class="section">
                <h2>Modo de Uso</h2>
                <p>{{ $produto->modo_uso }}</p>
            </div>

            <!-- Ícones de Estágios, Períodos e Composição -->
            <div class="icons-container">
                <!-- Estágios Animais -->
                @if($produto->estagiosAnimais->count() > 0)
                <div class="icon-group">
                    <h3>Estágios</h3>
                    <table class="icons-table">
                        <tr>
                            @foreach($produto->estagiosAnimais as $estagio)
                            <td class="icon-item">
                                <img src="{{ public_path('storage/' . $estagio->icone) }}" alt="{{ $estagio->nome }}">
                                <p>{{ $estagio->nome }}</p>
                            </td>
                            @endforeach
                        </tr>
                    </table>
                </div>
                @endif

                <!-- Períodos -->
                @if($produto->periodos->count() > 0)
                <div class="icon-group">
                    <h3>Períodos</h3>
                    <table class="icons-table">
                        <tr>
                            @foreach($produto->periodos as $periodo)
                            <td class="icon-item">
                                <img src="{{ public_path('storage/' . $periodo->icone) }}" alt="{{ $periodo->nome }}">
                                <p>{{ $periodo->nome }}</p>
                            </td>
                            @endforeach
                        </tr>
                    </table>
                </div>
                @endif

                <!-- Composição -->
                @php
                $proteina = $produto->nutrientes->firstWhere('id', 21);
                $ureia = $produto->nutrientes->firstWhere('id', 19);
                $aditivos = $produto->nutrientes->filter(function($nutriente) {
                return in_array($nutriente->id, [17, 23]);
                });
                @endphp

                @if($proteina || $ureia || $aditivos->count() > 0)
                <div class="icon-group">
                    <h3>Composição</h3>
                    <table class="icons-table">
                        <tr>
                            @if($proteina && is_numeric(floatval($proteina->pivot->minimo)))
                            <td class="icon-item">
                                <img src="{{ public_path('img/proteina.png') }}" alt="Proteína Bruta">
                                <p>
                                    {{ number_format((floatval($proteina->pivot->minimo) / 1000) * 100) }}% de Proteína Bruta
                                </p>
                            </td>
                            @endif


                            @if($ureia)
                            <td class="icon-item">
                                <img src="{{ public_path('img/ureia.png') }}" alt="Contém Ureia">
                                <p>Contém Ureia</p>
                            </td>
                            @endif

                            @if($aditivos->count() > 0)
                            <td class="icon-item">
                                <img src="{{ public_path('img/aditivos.png') }}" alt="Aditivos (Ionóforos)">
                                <p>Aditivos (Ionóforos)</p>
                            </td>
                            @endif
                        </tr>
                    </table>
                </div>
                @endif
            </div>

            <!-- Layout de Sacaria e Tabela -->
            <table class="layout-table">
                <tr>
                    <!-- Sacaria -->
                    <td class="col-left">
                        <img src="{{ public_path('storage/' . $produto->familia->sacaria) }}" alt="Sacaria">
                    </td>
                    <!-- Tabela de Nutrientes -->
                    <td class="col-right">
                        <div class="nutrient-title">
                            Níveis de Garantia por Kg do Produto
                        </div>
                        <table class="table">
                            <tbody>
                                @foreach($nutrientes as $nutriente)
                                <tr>
                                    <td>
                                        {{ $nutriente->nome }}
                                        @if(!is_null($nutriente->pivot->minimo) && !is_null($nutriente->pivot->maximo))
                                        (Mínimo/Máximo)
                                        @elseif(!is_null($nutriente->pivot->minimo))
                                        (Mínimo)
                                        @elseif(!is_null($nutriente->pivot->maximo))
                                        (Máximo)
                                        @endif
                                    </td>
                                    <td>
                                        @if(!is_null($nutriente->pivot->minimo) && !is_null($nutriente->pivot->maximo))
                                        {{ $nutriente->pivot->minimo }} {{ $nutriente->pivot->medidamin ?? '' }} / {{ $nutriente->pivot->maximo }} {{ $nutriente->pivot->medidamax ?? '' }}
                                        @elseif(!is_null($nutriente->pivot->minimo))
                                        {{ $nutriente->pivot->minimo }} {{ $nutriente->pivot->medidamin ?? '' }}
                                        @elseif(!is_null($nutriente->pivot->maximo))
                                        {{ $nutriente->pivot->maximo }} {{ $nutriente->pivot->medidamax ?? '' }}
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>
