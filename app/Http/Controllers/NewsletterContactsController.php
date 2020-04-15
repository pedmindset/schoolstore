<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\NewsletterContactCreateRequest;
use App\Http\Requests\NewsletterContactUpdateRequest;
use App\Repositories\NewsletterContactRepositoryEloquent as NewsletterContactRepository;

/**
 * Class NewsletterContactsController.
 *
 * @package namespace App\Http\Controllers;
 */
class NewsletterContactsController extends Controller
{
    /**
     * @var NewsletterContactRepository
     */
    protected $repository;


    /**
     * NewsletterContactsController constructor.
     *
     * @param NewsletterContactRepository $repository
     */
    public function __construct(NewsletterContactRepository $repository)
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
        $newsletterContacts = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $newsletterContacts,
            ]);
        }

        return view('newsletterContacts.index', compact('newsletterContacts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  NewsletterContactCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Exception
     */
    public function store(NewsletterContactCreateRequest $request)
    {
        try {
            $newsletterContact = $this->repository->create($request->all());

            $response = [
                'message' => 'NewsletterContact created.',
                'data'    => $newsletterContact->toArray(),
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
        $newsletterContact = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $newsletterContact,
            ]);
        }

        return view('newsletterContacts.show', compact('newsletterContact'));
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
        $newsletterContact = $this->repository->find($id);

        return view('newsletterContacts.edit', compact('newsletterContact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  NewsletterContactUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Exception
     */
    public function update(NewsletterContactUpdateRequest $request, $id)
    {
        try {
            $newsletterContact = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'NewsletterContact updated.',
                'data'    => $newsletterContact->toArray(),
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
                'message' => 'NewsletterContact deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'NewsletterContact deleted.');
    }
}
