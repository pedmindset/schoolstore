<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\SchoolCategoryCreateRequest;
use App\Http\Requests\SchoolCategoryUpdateRequest;
use App\Repositories\SchoolCategoryRepositoryEloquent as SchoolCategoryRepository;

/**
 * Class SchoolCategoriesController.
 *
 * @package namespace App\Http\Controllers;
 */
class SchoolCategoriesController extends Controller
{
    /**
     * @var SchoolCategoryRepository
     */
    protected $repository;

    /**
     * SchoolCategoriesController constructor.
     *
     * @param SchoolCategoryRepository $repository
     * @param SchoolCategoryValidator $validator
     */
    public function __construct(SchoolCategoryRepository $repository)
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
        $schoolCategories = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $schoolCategories,
            ]);
        }

        return view('schoolCategories.index', compact('schoolCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SchoolCategoryCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Exception
     */
    public function store(SchoolCategoryCreateRequest $request)
    {
        try {

            $schoolCategory = $this->repository->create($request->all());

            $response = [
                'message' => 'SchoolCategory created.',
                'data'    => $schoolCategory->toArray(),
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
        $schoolCategory = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $schoolCategory,
            ]);
        }

        return view('schoolCategories.show', compact('schoolCategory'));
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
        $schoolCategory = $this->repository->find($id);

        return view('schoolCategories.edit', compact('schoolCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SchoolCategoryUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Exception
     */
    public function update(SchoolCategoryUpdateRequest $request, $id)
    {
        try {

            $schoolCategory = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'SchoolCategory updated.',
                'data'    => $schoolCategory->toArray(),
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
                'message' => 'SchoolCategory deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'SchoolCategory deleted.');
    }
}
