<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\VehicleCreateRequest;
use App\Http\Requests\VehicleUpdateRequest;
use App\Repositories\VehicleRepositoryEloquent as VehicleRepository;

/**
 * Class VehiclesController.
 *
 * @package namespace App\Http\Controllers;
 */
class VehiclesController extends Controller
{
    /**
     * @var VehicleRepository
     */
    protected $repository;

    /**
     * VehiclesController constructor.
     *
     * @param VehicleRepository $repository
     */
    public function __construct(VehicleRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria')) ;
        $vehicles = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $vehicles,
            ]);
        }

        return view('vehicles.index', compact('vehicles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  VehicleCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Exception
     */
    public function store(VehicleCreateRequest $request)
    {
        try {
            $vehicle = $this->repository->create($request->all());

            $response = [
                'message' => 'Vehicle created.',
                'data'    => $vehicle->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (\Exception $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessage()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehicle = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $vehicle,
            ]);
        }

        return view('vehicles.show', compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicle = $this->repository->find($id);

        return view('vehicles.edit', compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  VehicleUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Exception
     */
    public function update(VehicleUpdateRequest $request, $id)
    {
        try {
            $vehicle = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Vehicle updated.',
                'data'    => $vehicle->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (\Exception $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessage()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Vehicle deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Vehicle deleted.');
    }
}
