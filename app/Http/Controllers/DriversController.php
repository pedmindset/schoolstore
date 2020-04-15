<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\DriverCreateRequest;
use App\Http\Requests\DriverUpdateRequest;
use App\Repositories\DriverRepositoryEloquent as DriverRepository;


/**
 * Class DriversController.
 *
 * @package namespace App\Http\Controllers;
 */
class DriversController extends Controller
{
    /**
     * @var DriverRepository
     */
    protected $repository;

    /**
     * DriversController constructor.
     *
     * @param DriverRepository $repository
     */
    public function __construct(DriverRepository $repository)
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
        $drivers = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $drivers,
            ]);
        }

        return view('drivers.index', compact('drivers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DriverCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Exception
     */
    public function store(DriverCreateRequest $request)
    {
        try {
            $driver = $this->repository->create($request->all());

            $response = [
                'message' => 'Driver created.',
                'data'    => $driver->toArray(),
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
        $driver = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $driver,
            ]);
        }

        return view('drivers.show', compact('driver'));
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
        $driver = $this->repository->find($id);

        return view('drivers.edit', compact('driver'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DriverUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Exception
     */
    public function update(DriverUpdateRequest $request, $id)
    {
        try {
            $driver = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Driver updated.',
                'data'    => $driver->toArray(),
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
                'message' => 'Driver deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Driver deleted.');
    }
}
