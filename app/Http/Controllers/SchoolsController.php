<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\SchoolCreateRequest;
use App\Http\Requests\SchoolUpdateRequest;
use App\Repositories\SchoolRepositoryEloquent as SchoolRepository;

/**
 * Class SchoolsController.
 *
 * @package namespace App\Http\Controllers;
 */
class SchoolsController extends Controller
{
    /**
     * @var SchoolRepository
     */
    protected $repository;

    /**
     * SchoolsController constructor.
     *
     * @param SchoolRepository $repository
     * @param SchoolValidator $validator
     */
    public function __construct(SchoolRepository $repository)
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
        $schools = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $schools,
            ]);
        }

        return view('schools.index', compact('schools'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SchoolCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Exception
     */
    public function store(SchoolCreateRequest $request)
    {
        try {

            $school = $this->repository->create($request->all());

            $response = [
                'message' => 'School created.',
                'data'    => $school->toArray(),
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
        $school = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $school,
            ]);
        }

        return view('schools.show', compact('school'));
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
        $school = $this->repository->find($id);

        return view('schools.edit', compact('school'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SchoolUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Exception
     */
    public function update(SchoolUpdateRequest $request, $id)
    {
        try {

            $school = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'School updated.',
                'data'    => $school->toArray(),
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
                'message' => 'School deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'School deleted.');
    }
}
