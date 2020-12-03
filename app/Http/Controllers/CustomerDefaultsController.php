<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CustomerDefaultCreateRequest;
use App\Http\Requests\CustomerDefaultUpdateRequest;

/**
 * Class CustomerDefaultsController.
 *
 * @package namespace App\Http\Controllers;
 */
class CustomerDefaultsController extends Controller
{
    /**
     * @var
     */
    protected $repository;


    /**
     * CustomerDefaultsController constructor.
     *
     * @param  $repository
     */
    public function __construct($repository)
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
        $customerDefaults = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $customerDefaults,
            ]);
        }

        return view('customerDefaults.index', compact('customerDefaults'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CustomerDefaultCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Exception
     */
    public function store(CustomerDefaultCreateRequest $request)
    {
        try {

            $customerDefault = $this->repository->create($request->all());

            $response = [
                'message' => 'CustomerDefault created.',
                'data'    => $customerDefault->toArray(),
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
        $customerDefault = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $customerDefault,
            ]);
        }

        return view('customerDefaults.show', compact('customerDefault'));
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
        $customerDefault = $this->repository->find($id);

        return view('customerDefaults.edit', compact('customerDefault'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CustomerDefaultUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Exception
     */
    public function update(CustomerDefaultUpdateRequest $request, $id)
    {
        try {
            $customerDefault = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'CustomerDefault updated.',
                'data'    => $customerDefault->toArray(),
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
                'message' => 'CustomerDefault deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'CustomerDefault deleted.');
    }
}
