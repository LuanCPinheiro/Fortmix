<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Representante;
use App\Models\Cidade;
use App\Models\Estado;
use Illuminate\Support\Facades\Storage;

class RepresentanteController extends Controller {

    private $obj;
    private $user;
    private $cidade;
    private $estado;

    public function __construct() {
        $this->obj = new Representante();
        $this->cidade = new Cidade();
        $this->estado = new Estado();
    }

    /**
     * Display a listing of the resource.
     */
    public function index() {
        $representantes = $this->obj->orderBy('nome')->get();
        $estados = $this->estado->join('cidade', 'estado.id', 'cidade.uf')
                ->select('estado.*')
                ->where('cidade.atendida', '=', 1)
                ->groupBy('estado.id')
                ->orderBy('estado.nome')
                ->get();
        
//        dd($estados);
        
        return view('representantes.index', ['representantes' => $representantes, 'estados' => $estados]);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        //
    }

}
