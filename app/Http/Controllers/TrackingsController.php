<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\TrackingCreateRequest;
use App\Http\Requests\TrackingUpdateRequest;
use App\Repositories\TrackingRepositoryEloquent as TrackingRepository;

/**
 * Class TrackingsController.
 *
 * @package namespace App\Http\Controllers;
 */
class TrackingsController extends Controller
{
    /**
     * @var TrackingRepository
     */
    protected $repository;

    /**
     * TrackingsController constructor.
     *
     * @param TrackingRepository $repository
     */
    public function __construct(TrackingRepository $repository)
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
        $trackings = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $trackings,
            ]);
        }

        return view('trackings.index', compact('trackings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TrackingCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Exception
     */
    public function store(TrackingCreateRequest $request)
    {
        try {
            $tracking = $this->repository->create($request->all());

            $response = [
                'message' => 'Tracking created.',
                'data'    => $tracking->toArray(),
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
        $tracking = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $tracking,
            ]);
        }

        return view('trackings.show', compact('tracking'));
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
        $tracking = $this->repository->find($id);

        return view('trackings.edit', compact('tracking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TrackingUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Exception
     */
    public function update(TrackingUpdateRequest $request, $id)
    {
        try {
            $tracking = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Tracking updated.',
                'data'    => $tracking->toArray(),
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
                'message' => 'Tracking deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Tracking deleted.');
    }
}
