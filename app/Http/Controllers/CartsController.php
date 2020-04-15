<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CartCreateRequest;
use App\Http\Requests\CartUpdateRequest;
use App\Repositories\CartRepositoryEloquent as CartRepository;

/**
 * Class CartsController.
 *
 * @package namespace App\Http\Controllers;
 */
class CartsController extends Controller
{
    /**
     * @var CartRepository
     */
    protected $repository;

    /**
     * CartsController constructor.
     *
     * @param CartRepository $repository
     * @param Cart\ $\
     */
    public function __construct(CartRepository $repository)
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
        $carts = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $carts,
            ]);
        }

        return view('carts.index', compact('carts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CartCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Exception
     */
    public function store(CartCreateRequest $request)
    {
        try {

            $cart = $this->repository->create($request->all());

            $response = [
                'message' => 'Cart created.',
                'data'    => $cart->toArray(),
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
        $cart = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $cart,
            ]);
        }

        return view('carts.show', compact('cart'));
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
        $cart = $this->repository->find($id);

        return view('carts.edit', compact('cart'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CartUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Exception
     */
    public function update(CartUpdateRequest $request, $id)
    {
        try {

            $cart = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Cart updated.',
                'data'    => $cart->toArray(),
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
                'message' => 'Cart deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Cart deleted.');
    }
}
