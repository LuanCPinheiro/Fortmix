<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cidade;
use App\Models\Estado;
use Illuminate\Support\Facades\Storage;

class RepresentanteController extends Controller {

    private $obj;
    private $cidade;
    private $estado;

    public function __construct() {
        $this->obj = new User();
        $this->cidade = new Cidade();
        $this->estado = new Estado();
    }

    /**
     * Display a listing of the resource.
     */
    public function index() {
        $representantes = $this->obj->orderby('cidade_id')->orderBy('name')->where('repactive', '=', 1)->get();
        $desativados = $this->obj->orderBy('name')->where('active', '=', 0)->where('repactive', '=', 0)->get();
        $estados = $this->estado->join('cidade', 'estado.id', 'cidade.uf')
                ->select('estado.*')
                ->where('cidade.atendida', '=', 1)
                ->groupBy('estado.id')
                ->orderBy('estado.nome')
                ->get();

//        dd($estados);

        return view('representantes.index', ['representantes' => $representantes, 'estados' => $estados, 'desativados' => $desativados]);
    }

    public function cidadesAtendidas($userId) {
        $user = $this->obj->find($userId);
        return response()->json($user->cidades()->get(['id', 'nome'])->toArray());
    }

    public function salvarCidadesAtendidas(Request $request, $userId) {
        $user = $this->obj->find($userId);
        $cidades = collect($request->input('cidades'))->pluck('id');
        $user->cidades()->sync($cidades);
        return response()->json(['success' => true]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $estado = $this->estado->find($request->estado);
        $data = $this->obj->create([
            'cidade_id' => $request->cidade,
            'name' => $request->nome,
            'sexo' => $request->sexo,
            'tel1' => $request->tel1,
            'tel2' => $request->tel2,
            'uf' => $estado->uf,
            'apelido' => $request->apelido,
            'cargo' => $request->cargo,
            'formacao' => $request->formacao,
            'nivelpermissao' => 2,
            'active' => 1,
            'repactive' => 1
        ]);

        if ($data) {
            $msg = "Representante cadastrado com sucesso!";
            return redirect('dashboard/representantes')->with('msg', $msg);
        } else {
            $msg = "Erro ao cadastrar Representante, contate o administrador!";
            return redirect('dashboard/representantes')->with(['msg' => $msg, 'danger' => "danger"]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        
    }

    public function ativar($id) {
        $data = $this->obj->where('id', $id)->update([
            'active' => 1,
            'repactive' => 1
        ]);

        if ($data) {
            $msg = "Representante ativado com sucesso!";
            return redirect('dashboard/representantes')->with('msg', $msg);
        } else {
            $msg = "Erro ao ativar Representante, contate o administrador!";
            return redirect('dashboard/representantes')->with(['msg' => $msg, 'danger' => "danger"]);
        }
    }

    public function desativar($id) {
        $data = $this->obj->where('id', $id)->update([
            'active' => 0,
            'repactive' => 0
        ]);

        if ($data) {
            $msg = "Representante desativado com sucesso!";
            return redirect('dashboard/representantes')->with('msg', $msg);
        } else {
            $msg = "Erro ao desativar Representante, contate o administrador!";
            return redirect('dashboard/representantes')->with(['msg' => $msg, 'danger' => "danger"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        $del = $this->obj->destroy($id);

        if ($del) {
            $msg = "Representante excluído com sucesso!";
            return redirect('dashboard/representantes')->with(['msg' => $msg]);
        } else {
            $msg = "Erro ao deletar o representante!";
            return redirect('dashboard/representantes')->with(['msg' => $msg, 'danger' => "danger"]);
        }
    }

}
