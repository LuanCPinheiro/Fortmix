<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Produto;
use Illuminate\Http\Request;

class DashboardController extends Controller {

    public function generatePdf($id) {
        // Buscar o produto com seus relacionamentos
        $produto = Produto::with(['familia', 'pecuaria', 'nutrientes', 'estagiosAnimais', 'periodos'])->findOrFail($id);

        // Filtrar apenas os nutrientes com valores preenchidos
        $nutrientesPreenchidos = $produto->nutrientes->filter(function ($nutriente) {
            return !is_null($nutriente->pivot->minimo) || !is_null($nutriente->pivot->maximo);
        });

        // Verificar se há ícones em Estágios, Períodos ou Composição
        $temEstagios = $produto->estagiosAnimais->count() > 0;
        $temPeriodos = $produto->periodos->count() > 0;

// Lógica para Composição (ID: 21, 19, 17, 23)
        $temComposicao = $produto->nutrientes->filter(function ($nutriente) {
                    return in_array($nutriente->id, [21, 19, 17, 23]);
                })->count() > 0;

// Calcular altura adicional para ícones (120px por grupo presente)
        $alturaIcones = 0;
        if ($temEstagios) {
            $alturaIcones += 150;
        }
        if ($temPeriodos) {
            $alturaIcones += 150;
        }
        if ($temComposicao) {
            $alturaIcones += 150;
        } else {
            $alturaIcones += 50;
        }

// **Cálculo da Altura Dinâmica**
        $linhasTabela = $nutrientesPreenchidos->count();
        $alturaTabela = $linhasTabela * 40; // 40px por linha da tabela

        $alturaCabecalho = 150; // Altura fixa para o cabeçalho
        $alturaTexto = 100 + strlen($produto->indicacao_uso) / 2 + strlen($produto->modo_uso) / 2;
        $alturaTexto = min(max($alturaTexto, 300), 3000);

// Altura total dinâmica
        $alturaTotal = $alturaCabecalho + $alturaTexto + $alturaTabela + $alturaIcones + 50; // 50px de margem extra
        $alturaFinal = min(max($alturaTotal, 842), 3000); // Limitar entre 842px (A4 padrão) e 3000px
// Definir o título do arquivo
        $tituloArquivo = in_array($produto->familia->nome, ['FortBeef', 'FortLac']) ? $produto->nome : 'FortMix ' . $produto->nome;

// Carregar a view para o PDF
        $pdf = Pdf::loadView('pdf.produto', [
                    'produto' => $produto,
                    'nutrientes' => $nutrientesPreenchidos,
        ]);

// Configurar tamanho do PDF dinamicamente
        $pdf->setPaper([0, 0, 595.28, $alturaFinal], 'portrait');

        return $pdf->download($tituloArquivo . '.pdf');
    }

    public function previewPdf($id) {
        // Buscar o produto com seus relacionamentos
        $produto = Produto::with(['familia', 'pecuaria', 'nutrientes', 'estagiosAnimais', 'periodos', 'pecuarias'])->findOrFail($id);

        // Filtrar nutrientes preenchidos
        $nutrientesPreenchidos = $produto->nutrientes->filter(function ($nutriente) {
            return !is_null($nutriente->pivot->minimo) || !is_null($nutriente->pivot->maximo);
        });

        // Retornar a view no navegador
        return view('pdf.produto2', [
            'produto' => $produto,
            'nutrientes' => $nutrientesPreenchidos,
        ]);
    }

}
