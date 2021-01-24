<?php

namespace App\Modules\Banner\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Modules\Banner\Repositories\BannerInterface;
use App\Modules\Video\Repositories\VideoInterface;

class BannerController extends Controller
{
    protected $video;
    protected $banner;
    
    public function __construct(VideoInterface $video, BannerInterface $banner) 
    {
        $this->video = $video;
        $this->banner = $banner;
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    { 
        $search = $request->all();
        $data['banner_info'] = $this->banner->findAll($limit= 50,$search);  
        return view('banner::banner.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $data['is_edit'] = false;
        $data['video'] = $this->video->getList(); 
        return view('banner::banner.create',$data);
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
            if ($request->hasFile('banner_image')) {
                $data['banner_image'] = $this->banner->upload($data['banner_image']);
            }

            $this->banner->save($data);

            alertify()->success('Banner Created Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        
        return redirect(route('banner.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('banner::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data['is_edit'] = true;
        $data['video'] = $this->video->getList();
        $data['banner_info'] = $this->banner->find($id);
        return view('banner::banner.edit',$data);
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

            if ($request->hasFile('banner_image')) {
                $data['banner_image'] = $this->banner->upload($data['banner_image']);
            }

            $this->banner->update($id,$data);

            alertify()->success('Banner Updated Successfully');
            
        }catch(\Throwable $e){
           alertify($e->getMessage())->error();
        }
        
        return redirect(route('banner.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        try{
            $this->banner->delete($id);
             alertify()->success('Banner Deleted Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
      return redirect(route('banner.index'));
    }

   }
