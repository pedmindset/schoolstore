<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ReceiptCreateRequest;
use App\Http\Requests\ReceiptUpdateRequest;
use App\Repositories\ReceiptRepositoryEloquent as ReceiptRepository;

/**
 * Class ReceiptsController.
 *
 * @package namespace App\Http\Controllers;
 */
class ReceiptsController extends Controller
{
    /**
     * @var ReceiptRepository
     */
    protected $repository;

    /**
     * ReceiptsController constructor.
     *
     * @param ReceiptRepository $repository
     * @param ReceiptValidator $validator
     */
    public function __construct(ReceiptRepository $repository)
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
        $receipts = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $receipts,
            ]);
        }

        return view('receipts.index', compact('receipts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ReceiptCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Exception
     */
    public function store(ReceiptCreateRequest $request)
    {
        try {

            $receipt = $this->repository->create($request->all());

            $response = [
                'message' => 'Receipt created.',
                'data'    => $receipt->toArray(),
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
        $receipt = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $receipt,
            ]);
        }

        return view('receipts.show', compact('receipt'));
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
        $receipt = $this->repository->find($id);

        return view('receipts.edit', compact('receipt'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ReceiptUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Exception
     */
    public function update(ReceiptUpdateRequest $request, $id)
    {
        try {

            $receipt = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Receipt updated.',
                'data'    => $receipt->toArray(),
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
                'message' => 'Receipt deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Receipt deleted.');
    }
}
