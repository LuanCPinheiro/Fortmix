<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cidade;
use App\Models\Estado;
use Illuminate\Support\Facades\Storage;

class CidadeController extends Controller {

    private $obj;
    private $estado;

    public function __construct() {
        $this->obj = new Cidade();
        $this->estado = new Estado();
    }

    /**
     * Display a listing of the resource.
     */
    public function index() {
        $cidadesMS = $this->obj->where('uf', '=', 12)->where('atendida', '=', 1)->orderBy('nome')->get();
        $cidadesMT = $this->obj->where('uf', '=', 13)->where('atendida', '=', 1)->orderBy('nome')->get();
        $cidadesGO = $this->obj->where('uf', '=', 9)->where('atendida', '=', 1)->orderBy('nome')->get();
        $cidadesMG = $this->obj->where('uf', '=', 11)->where('atendida', '=', 1)->orderBy('nome')->get();
        $cidadesSP = $this->obj->where('uf', '=', 26)->where('atendida', '=', 1)->orderBy('nome')->get();

        return view('cidades.index', ['cidadesMS' => $cidadesMS,
            'cidadesMT' => $cidadesMT,
            'cidadesGO' => $cidadesGO,
            'cidadesMG' => $cidadesMG,
            'cidadesSP' => $cidadesSP,]);
    }

    public function addRegiao(Request $request) {
        $data = $this->obj->where('id', $request->cidade)->update([
            'atendida' => 1,
        ]);

        if ($data) {
            $msg = "Região adicionada!";
            return redirect('dashboard/regioesatendidas')->with('msg', $msg);
        } else {
            $msg = "Erro ao adicionar região!";
            return redirect('dashboard/regioesatendidas')->with(['msg' => $msg, 'danger' => 'danger']);
        }
    }

    public function buscarCidades($uf) {
        $estado = $this->estado->where('uf', 'like', $uf)->first();
        $cidades = $this->obj->where('uf', '=', $estado->id)->where('atendida', '=', 0)->get();
        $retorno = [];

        foreach ($cidades as $cidade) {
            $retorno[] = [
                'nome' => $cidade->nome,
                'id' => $cidade->id,
                'uf' => $cidade->estado->uf
            ];
        }

        return json_encode($retorno);
    }

}
