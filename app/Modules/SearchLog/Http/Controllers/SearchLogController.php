<?php

namespace App\Modules\SearchLog\Http\Controllers;

use App\Modules\SearchLog\Repositories\SearchLogInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class SearchLogController extends Controller
{
    protected $searchLog;

    public function __construct(SearchLogInterface $searchLog)
    {
        $this->searchLog = $searchLog;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data['search_log'] = $this->searchLog->findAll();
        return view('searchlog::searchlog.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('searchlog::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('searchlog::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('searchlog::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        try {
            $this->searchLog->delete($id);
            alertify()->success('Search Log Deleted Successfully');
        } catch (\Throwable $e) {
            alertify($e->getMessage())->error();
        }
        return redirect(route('search_log.index'));
    }
}
