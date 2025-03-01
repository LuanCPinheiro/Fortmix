<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>{{ $produto->nome }}</title>
        <style>
            @page {
                margin: 5mm;
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
                font-size: 18px;
                font-weight: bold;
            }
            .section {
                margin-bottom: 10px;
            }
            .section h2 {
                background-color: #900;
                color: #fff;
                padding: 5px;
                font-size: 14px;
                margin-bottom: 5px;
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
                font-size: 12px;
                text-align: center;
                padding: 5px;
                background-color: #900;
                color: #fff;
            }
            .table {
                width: 100%;
                border-collapse: collapse;
                font-size: 10px;
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
    </head>
    <body>
        <div class="container">
            <!-- Ícone do Produto -->
            <div class="header">
                <img src="{{ asset('storage/' . $produto->icone) }}" alt="Produto">
                <h1>{{ $produto->nome }}</h1>
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

            <!-- Layout de Sacaria e Tabela -->
            <table class="layout-table">
                <tr>
                    <!-- Sacaria -->
                    <td class="col-left">
                        <img src="{{ asset('storage/' . $produto->familia->sacaria) }}" alt="Sacaria">
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
