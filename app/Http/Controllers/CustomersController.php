<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CustomerCreateRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Repositories\CustomerRepositoryEloquent as CustomerRepository;

/**
 * Class CustomersController.
 *
 * @package namespace App\Http\Controllers;
 */
class CustomersController extends Controller
{
    /**
     * @var CustomerRepository
     */
    protected $repository;


    /**
     * CustomersController constructor.
     *
     * @param CustomerRepository $repository
     * @param CustomerValidator $validator
     */
    public function __construct(CustomerRepository $repository)
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
        // $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $customers = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $customers,
            ]);
        }

        return view('customers.index', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CustomerCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function store(CustomerCreateRequest $request)
    {
        try {

            $customer = $this->repository->create($request->all());

            $response = [
                'message' => 'Customer created.',
                'data'    => $customer->toArray(),
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
        $customer = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $customer,
            ]);
        }

        return view('customers.show', compact('customer'));
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
        $customer = $this->repository->find($id);

        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CustomerUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(CustomerUpdateRequest $request, $id)
    {
        try {

            $customer = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Customer updated.',
                'data'    => $customer->toArray(),
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
                'message' => 'Customer deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Customer deleted.');
    }
}
