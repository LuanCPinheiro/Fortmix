<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {

    private $obj;

    function __construct() {
        $this->obj = new User();
    }

    /**
     * Display a listing of the resource.
     */
    public function index() {
        $usuariosAtivos = $this->obj->where('active', '=', 1)->orderByDesc('nivelpermissao')->get();
        $usuariosInativos = $this->obj->where('active', '=', 0)->orderByDesc('nivelpermissao')->get();

        return view('usuarios.index')->with(['usuariosAtivos' => $usuariosAtivos, 'usuariosInativos' => $usuariosInativos]);
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
        $password = Hash::make($request->password);

        $data = $this->obj->create([
            'name' => $request->name,
            'email' => $request->email,
            'nivelpermissao' => $request->nivelpermissao,
            'password' => $password,
            'active' => 0
        ]);

        if ($data) {
            $msg = "Usuário cadastrado com sucesso!";
            return redirect('dashboard/usuarios')->with('msg', $msg);
        } else {
            $msg = "Erro ao cadastrar usuário, contate o administrador!";
            return redirect('dashboard/usuarios')->with(['msg' => $msg, 'danger' => "danger"]);
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
        //
    }

    public function ativar($id) {
        $data = $this->obj->where('id', $id)->update([
            'active' => 1
        ]);

        if ($data) {
            $msg = "Usuário ativado com sucesso!";
            return redirect('dashboard/usuarios')->with('msg', $msg);
        } else {
            $msg = "Erro ao ativar Usuário, contate o administrador!";
            return redirect('dashboard/usuarios')->with(['msg' => $msg, 'danger' => "danger"]);
        }
    }

    public function desativar($id) {
        $data = $this->obj->where('id', $id)->update([
            'active' => 0
        ]);

        if ($data) {
            $msg = "Usuário desativado com sucesso!";
            return redirect('dashboard/usuarios')->with('msg', $msg);
        } else {
            $msg = "Erro ao desativar Usuário, contate o administrador!";
            return redirect('dashboard/usuarios')->with(['msg' => $msg, 'danger' => "danger"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        $del = $this->obj->destroy($id);

        if ($del) {
            $msg = "Usuário excluído com sucesso!";
            return redirect('dashboard/usuarios')->with(['msg' => $msg]);
        } else {
            $msg = "Erro ao deletar o Usuário!";
            return redirect('dashboard/usuarios')->with(['msg' => $msg, 'danger' => "danger"]);
        }
    }

}
