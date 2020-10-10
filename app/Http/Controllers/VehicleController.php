<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\{VehicleStoreRequest, VehicleUpdateRequest};
use App\Models\StatusHistory;

class VehicleController extends Controller
{
    /**
     * Implementando autenticação no construtor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $veiculos = Vehicle::orderBy('created_at', 'desc')->paginate(20);

        return view('dashboard.veiculos.index', [
            'veiculos' => $veiculos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.veiculos.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\VehicleStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VehicleStoreRequest $request)
    {
        try{
            DB::beginTransaction();

            $vehicle = new Vehicle();
            $vehicle->create($request->all());

            DB::commit();

            return $this->typeReturn($request, 'Veículo cadastrado com sucesso');

        }catch(\Exception $e){
            DB::rollback();

            return redirect()->route('veiculos.new')
            ->with('message', 'Não foi possível completar o registro ocorreu um erro inesperado.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        return view('dashboard.veiculos.form', [
            'vehicle' => $vehicle,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\VehicleUpdateRequest  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(VehicleUpdateRequest $request, Vehicle $vehicle)
    {
        try{
            DB::beginTransaction();

            if($request->input('status') != $vehicle->status){
                if( $request->has('observacao') ){

                    $statusHistory = new StatusHistory();
                    $statusHistory->vehicle_id = $vehicle->id;
                    $statusHistory->to = $vehicle->status;
                    $statusHistory->from = $request->input('status');
                    $statusHistory->note = $request->input('observacao');
                    $statusHistory->save();

                }
            }

            $vehicle->update($request->all());

            DB::commit();

            return $this->typeReturn($request, 'Veículo atualizado com sucesso');

        }catch(\Exception $e){
            DB::rollback();

            return redirect()->route('veiculos.new')
            ->with('message', 'Não foi possível completar a atualização ocorreu um erro inesperado.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect()->route('veiculos')->with('message', 'O veículo foi deletado com sucesso');
    }


    public function typeReturn($request, $message){
        if($request->getContentType() == 'json'){
            return response()->json($message);
        }

        return redirect()->route('veiculos')->with('message', $message);
    }
}
