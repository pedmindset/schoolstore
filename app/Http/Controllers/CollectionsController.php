<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CollectionCreateRequest;
use App\Http\Requests\CollectionUpdateRequest;
use App\Repositories\CollectionRepositoryEloquent as CollectionRepository;

/**
 * Class CollectionsController.
 *
 * @package namespace App\Http\Controllers;
 */
class CollectionsController extends Controller
{
    /**
     * @var CollectionRepository
     */
    protected $repository;

    /**
     * CollectionsController constructor.
     *
     * @param CollectionRepository $repository
     */
    public function __construct(CollectionRepository $repository)
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
        $collections = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $collections,
            ]);
        }

        return view('collections.index', compact('collections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CollectionCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Exception
     */
    public function store(CollectionCreateRequest $request)
    {
        try {

            $collection = $this->repository->create($request->all());

            $response = [
                'message' => 'Collection created.',
                'data'    => $collection->toArray(),
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
        $collection = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $collection,
            ]);
        }

        return view('collections.show', compact('collection'));
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
        $collection = $this->repository->find($id);

        return view('collections.edit', compact('collection'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CollectionUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Exception
     */
    public function update(CollectionUpdateRequest $request, $id)
    {
        try {

            $collection = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Collection updated.',
                'data'    => $collection->toArray(),
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
                'message' => 'Collection deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Collection deleted.');
    }
}
