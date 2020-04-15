<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\WishlistCreateRequest;
use App\Http\Requests\WishlistUpdateRequest;
use App\Repositories\WishlistRepositoryEloquent as WishlistRepository;

/**
 * Class WishlistsController.
 *
 * @package namespace App\Http\Controllers;
 */
class WishlistsController extends Controller
{
    /**
     * @var WishlistRepository
     */
    protected $repository;

    /**
     * WishlistsController constructor.
     *
     * @param WishlistRepository $repository
     */
    public function __construct(WishlistRepository $repository)
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
        $wishlists = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $wishlists,
            ]);
        }

        return view('wishlists.index', compact('wishlists'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  WishlistCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Exception
     */
    public function store(WishlistCreateRequest $request)
    {
        try {
            $wishlist = $this->repository->create($request->all());

            $response = [
                'message' => 'Wishlist created.',
                'data'    => $wishlist->toArray(),
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
        $wishlist = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $wishlist,
            ]);
        }

        return view('wishlists.show', compact('wishlist'));
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
        $wishlist = $this->repository->find($id);

        return view('wishlists.edit', compact('wishlist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  WishlistUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Exception
     */
    public function update(WishlistUpdateRequest $request, $id)
    {
        try {
            $wishlist = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Wishlist updated.',
                'data'    => $wishlist->toArray(),
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
                'message' => 'Wishlist deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Wishlist deleted.');
    }
}
