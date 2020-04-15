<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ProductCategoryCreateRequest;
use App\Http\Requests\ProductCategoryUpdateRequest;
use App\Repositories\ProductCategoryRepositoryEloquent as ProductCategoryRepository;

/**
 * Class ProductCategoriesController.
 *
 * @package namespace App\Http\Controllers;
 */
class ProductCategoriesController extends Controller
{
    /**
     * @var ProductCategoryRepository
     */
    protected $repository;


    /**
     * ProductCategoriesController constructor.
     *
     * @param ProductCategoryRepository $repository
     */
    public function __construct(ProductCategoryRepository $repository)
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
        $productCategories = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $productCategories,
            ]);
        }

        return view('productCategories.index', compact('productCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProductCategoryCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Exception
     */
    public function store(ProductCategoryCreateRequest $request)
    {
        try {
            $productCategory = $this->repository->create($request->all());

            $response = [
                'message' => 'ProductCategory created.',
                'data'    => $productCategory->toArray(),
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
        $productCategory = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $productCategory,
            ]);
        }

        return view('productCategories.show', compact('productCategory'));
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
        $productCategory = $this->repository->find($id);

        return view('productCategories.edit', compact('productCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductCategoryUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Exception
     */
    public function update(ProductCategoryUpdateRequest $request, $id)
    {
        try {
            $productCategory = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'ProductCategory updated.',
                'data'    => $productCategory->toArray(),
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
                'message' => 'ProductCategory deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'ProductCategory deleted.');
    }
}
