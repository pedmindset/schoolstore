<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ProfileCreateRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Repositories\ProfileRepositoryEloquent as ProfileRepository;

/**
 * Class ProfilesController.
 *
 * @package namespace App\Http\Controllers;
 */
class ProfilesController extends Controller
{
    /**
     * @var ProfileRepository
     */
    protected $repository;


    /**
     * ProfilesController constructor.
     *
     * @param ProfileRepository $repository
     */
    public function __construct(ProfileRepository $repository)
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
        $profiles = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $profiles,
            ]);
        }

        return view('profiles.index', compact('profiles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProfileCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Exceptions
     */
    public function store(ProfileCreateRequest $request)
    {
        try {

            $profile = $this->repository->create($request->all());

            $response = [
                'message' => 'Profile created.',
                'data'    => $profile->toArray(),
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
        $profile = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $profile,
            ]);
        }

        return view('profiles.show', compact('profile'));
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
        $profile = $this->repository->find($id);

        return view('profiles.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProfileUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Exception
     */
    public function update(ProfileUpdateRequest $request, $id)
    {
        try {

            $profile = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Profile updated.',
                'data'    => $profile->toArray(),
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
                'message' => 'Profile deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Profile deleted.');
    }
}
