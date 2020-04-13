<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\BillingInformationCreateRequest;
use App\Http\Requests\BillingInformationUpdateRequest;
use App\Repositories\BillingInformationRepositoryEloquent as BillingInformationRepository;

/**
 * Class BillingInformationsController.
 *
 * @package namespace App\Http\Controllers;
 */
class BillingInformationsController extends Controller
{
    /**
     * @var BillingInformationRepository
     */
    protected $repository;

    /**
     * BillingInformationsController constructor.
     *
     * @param BillingInformationRepository $repository
     * @param BillingInformationValidator $validator
     */
    public function __construct(BillingInformationRepository $repository)
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
        $billingInformations = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $billingInformations,
            ]);
        }

        return view('billingInformations.index', compact('billingInformations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BillingInformationCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Exception
     */
    public function store(BillingInformationCreateRequest $request)
    {
        try {

            $billingInformation = $this->repository->create($request->all());

            $response = [
                'message' => 'BillingInformation created.',
                'data'    => $billingInformation->toArray(),
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
        $billingInformation = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $billingInformation,
            ]);
        }

        return view('billingInformations.show', compact('billingInformation'));
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
        $billingInformation = $this->repository->find($id);

        return view('billingInformations.edit', compact('billingInformation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BillingInformationUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Exception
     */
    public function update(BillingInformationUpdateRequest $request, $id)
    {
        try {

            $billingInformation = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'BillingInformation updated.',
                'data'    => $billingInformation->toArray(),
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
                'message' => 'BillingInformation deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'BillingInformation deleted.');
    }
}
