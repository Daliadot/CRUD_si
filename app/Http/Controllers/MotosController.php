<?php

namespace App\Http\Controllers;

use App\Models\motos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\controllers\Response;

class MotosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $registrosMoto = motos::All();

        $contador = $registrosMoto-> count();

        return ("Motos cadastradas".$contador.$registrosMoto.Response()->json([],Response::HTTP_NO_CONTENT));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $registrosMoto = $request->All();

        $validaDados = Validator::make($registrosMoto,[
            'modelo'=>required,
            'marca'=>required,
            'ano'=>required,
        ]);

        if($validaDados-fails()){
            return 'Registros faltantes: '.Response()->json([Response::HTTP_NO_CONTENT]);
        };

        $enviadados = motos::create($registrosMoto);

        if($enviadados){
            return 'Registros Cadastrados: '.Response()->json([],Response::HTTP_NO_CONTENT);
        }else{
            return 'Ewgistros não cadastrados: '.Response()->json([],Response::HTTP_NO_CONTENT);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(motos $motos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, motos $motos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(motos $motos)
    {
        //
    }
}
