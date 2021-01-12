<?php

namespace App\Modules\KhelauJuhari\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Modules\KhelauJuhari\Repositories\KhelauJuhariInterface;

class KhelauJuhariController extends Controller
{

    protected $khelaujuhari;
    
    public function __construct(KhelauJuhariInterface $khelaujuhari)
    {
        $this->khelaujuhari = $khelaujuhari;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    { 
        $search = $request->all();
        $data['khelaujuhari_info'] = $this->khelaujuhari->findAll($limit= 50,$search);  
        return view('khelaujuhari::khelaujuhari.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $data['is_edit'] = false;
        return view('khelaujuhari::khelaujuhari.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
    
         try{
            if ($request->hasFile('kj_cover_image')) {
                $data['kj_cover_image'] = $this->khelaujuhari->upload($data['kj_cover_image']);
            }

            $videoInfo = $this->khelaujuhari->save($data);

            alertify()->success('Khelau Juhari Created Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        
        return redirect(route('khelaujuhari.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('khelaujuhari::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data['is_edit'] = true;
        $data['khelaujuhari_info'] = $this->khelaujuhari->find($id);
        return view('khelaujuhari::khelaujuhari.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
       $data = $request->all();
        
        try{

            if ($request->hasFile('kj_cover_image')) {
                $data['kj_cover_image'] = $this->khelaujuhari->upload($data['kj_cover_image']);
            }

            $this->khelaujuhari->update($id,$data);

             alertify()->success('Khelau Juhari Updated Successfully');
        }catch(\Throwable $e){
           alertify($e->getMessage())->error();
        }
        
        return redirect(route('khelaujuhari.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        try{
            $this->khelaujuhari->delete($id);
             alertify()->success('Khelau Juhari Deleted Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
      return redirect(route('khelaujuhari.index'));
    }

}
