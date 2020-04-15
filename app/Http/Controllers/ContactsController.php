<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ContactCreateRequest;
use App\Http\Requests\ContactUpdateRequest;
use App\Repositories\ContactRepositoryEloquent as ContactRepository;

/**
 * Class ContactsController.
 *
 * @package namespace App\Http\Controllers;
 */
class ContactsController extends Controller
{
    /**
     * @var ContactRepository
     */
    protected $repository;

    /**
     * ContactsController constructor.
     *
     * @param ContactRepository $repository
     */
    public function __construct(ContactRepository $repository)
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
        $contacts = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $contacts,
            ]);
        }

        return view('contacts.index', compact('contacts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ContactCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Exception
     */
    public function store(ContactCreateRequest $request)
    {
        try {

            $contact = $this->repository->create($request->all());

            $response = [
                'message' => 'Contact created.',
                'data'    => $contact->toArray(),
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
        $contact = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $contact,
            ]);
        }

        return view('contacts.show', compact('contact'));
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
        $contact = $this->repository->find($id);

        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ContactUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Exception
     */
    public function update(ContactUpdateRequest $request, $id)
    {
        try {

            $contact = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Contact updated.',
                'data'    => $contact->toArray(),
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
                'message' => 'Contact deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Contact deleted.');
    }
}
