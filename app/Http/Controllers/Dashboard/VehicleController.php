<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use App\Models\Vehicle;
use App\Models\StatusHistory;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\{VehicleStoreRequest, VehicleUpdateRequest};

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
     * @return \Inertia\Response
     */
    public function index()
    {
        $veiculos = Vehicle::select(['chassi', 'marca', 'modelo', 'placa', 'status'])->orderBy('created_at', 'desc')->paginate(20);

        return Inertia::render('Dashboard/Veiculos/Index', [
            'veiculos' => $veiculos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Dashboard/Veiculos/Form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\VehicleStoreRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(VehicleStoreRequest $request)
    {
        try{
            DB::beginTransaction();

            $vehicle = new Vehicle();
            $vehicle->create($request->validated());

            DB::commit();

            return redirect()->route('veiculos.index')->with('message', 'Veículo cadastrado com sucesso');

        }catch(\Exception $e){
            DB::rollback();

            return redirect()->route('veiculos.index')
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
     * @return \Inertia\Response
     */
    public function edit(Vehicle $vehicle)
    {
        return Inertia::render('Dashboard/Veiculos/Form', [
            'vehicle' => $vehicle->only(['chassi', 'marca', 'modelo', 'placa', 'status']),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\VehicleUpdateRequest  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\RedirectResponse
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

            $vehicle->update($request->validated());

            DB::commit();

            return redirect()->route('veiculos.index')->with('message', 'Veículo atualizado com sucesso');

        }catch(\Exception $e){
            DB::rollback();

            return redirect()->route('veiculos.index')
            ->with('message', 'Não foi possível completar a atualização ocorreu um erro inesperado.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect()->route('veiculos.index')->with('message', 'O veículo foi deletado com sucesso');
    }
}
