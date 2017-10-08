<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Servico;
use Carbon\Carbon;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
        $servicos = Servico::with('cliente')
                            ->cliente($request->get('cliente'))
                            ->status($request->get('status'))
                            ->orderBy('id', 'desc')
                            ->paginate(5);

        $clientes = Cliente::pluck('nome', 'id');

        return view('index', compact('servicos', 'clientes'));
    }

    public function create()
    {
        $title = 'Cadastrar - Megatech';

        $clientes = Cliente::pluck('nome', 'id')->all();

        return view('create-edit', compact('title', 'clientes'));
    }

    public function store(Request $request)
    {
        $dataForm = $request->all();

        if(isset($dataForm['conferir']))
        {
            $cliente = Cliente::create($dataForm);
            $cliente->servicos()->create($dataForm);
        }

        else
            Servico::create($dataForm);

        return redirect()->route('index');
    }

    public function show($id)
    {
        $title = 'Ordem de serviço - Megatech';

        $servico = Servico::with('cliente')->find($id);

        return view('show', compact('servico', 'title'));
    }

    public function edit($id)
    {
        $title = 'Editar - Megatech';

        $servico = Servico::with('cliente')->find($id);

        return view('create-edit', compact('servico', 'title'));
    }

    public function update(Request $request, $id)
    {
        $dataForm = $request->all();

        $servico = Servico::find($id);
        $servico->update($dataForm);
        $servico->cliente()->update($dataForm);

        return redirect()->route('index');
    }

    public function destroy($id)
    {
        Servico::find($id)->delete();

        return redirect()->route('index');
    }

    public function alterarStatus(Request $request, $id)
    {
        if($request['status'] == 1)
            $data = Carbon::now();

        else
            $data = null;

        Servico::find($id)->update(['data_fechamento' => $data]);

        return redirect()->route('painel.show', $id);
    }
}
