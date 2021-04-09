<?php

namespace App\Modules\Ads\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Modules\Ads\Repositories\AdsInterface;

class AdsController extends Controller
{

    protected $ads;
    
    public function __construct(AdsInterface $ads) 
    {
        $this->ads = $ads;
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    { 
        $search = $request->all();
        $data['ads_info'] = $this->ads->findAll($limit= 50,$search);  
        return view('ads::ads.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $data['is_edit'] = false;
        return view('ads::ads.create',$data);
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
            if ($request->hasFile('ads_image')) {
                $data['ads_image'] = $this->ads->upload($data['ads_image']);
            }

            $this->ads->save($data);

            alertify()->success('Ads Created Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        
        return redirect(route('ads.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('ads::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data['is_edit'] = true;
        $data['ads_info'] = $this->ads->find($id);
        return view('ads::ads.edit',$data);
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

            if ($request->hasFile('ads_image')) {
                $data['ads_image'] = $this->ads->upload($data['ads_image']);
            }

            $this->ads->update($id,$data);

            alertify()->success('Ads Updated Successfully');
            
        }catch(\Throwable $e){
           alertify($e->getMessage())->error();
        }
        
        return redirect(route('ads.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        try{
            $this->ads->delete($id);
             alertify()->success('Ads Deleted Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
      return redirect(route('ads.index'));
    }


}
