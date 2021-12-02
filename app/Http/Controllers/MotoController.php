<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMotoRequest;
use App\Http\Requests\UpdateMotoRequest;
use App\Models\Moto;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class MotoController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $value = $request->value;

        $order_by = $request->order_by;
        $order = $request->order === 'desc'
            ? 'desc'
            : 'asc';

        $colunas = ['marca', 'modelo'];

        $motos = Moto::select(['*'])
            ->when($search && in_array($search, $colunas) && $value, function ($query) use ($search, $value) {
                $query->where($search, 'like', '%' . $value . '%');
            })
            ->when($order_by && in_array($order_by, $colunas), function ($query) use ($order_by, $order) {
                $query->orderBy($order_by, $order);
            })
            ->get();

        return response()->json($motos);
    }

    public function show($id)
    {
        $moto = Moto::findOrFail($id);
        //SELECT * FROM moto WHERE id = $id
        return response()->json($moto);
    }

    public function store(Request $request)
    {
        $dados = $request->all();

        $validator = Validator::make($dados, (new StoreMotoRequest())->rules());
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $moto = Moto::create($dados);
        //INSERT INTO motos (marca, modelo) VALUES ('$dados->marca', '$dados->modelo');
        return response()->json($moto, 201);
    }

    public function update(Request $request, $id)
    {
        $dados = $request->all();

        $validator = Validator::make($dados, (new UpdateMotoRequest())->rules());
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        Moto::findOrFail($id)->update($dados);
        //UPDATE motos SET marca = '$request->marca', modelo = '$request->modelo' WHERE id = $id;
        return $this->show($id);
    }

    public function destroy($id)
    {
        Moto::findOrFail($id)->delete();
        //DELETE FROM motos WHERE id = $id;
        return response()->json('', 204);
    }
}
