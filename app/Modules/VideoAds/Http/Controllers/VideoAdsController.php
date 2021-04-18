<?php

namespace App\Modules\VideoAds\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Modules\VideoAds\Http\Requests\VideoAdsRequest;

use App\Modules\VideoAds\Repositories\VideoAdsInterface;
use App\Modules\DynamicBlock\Repositories\BlockSectionInterface;

class VideoAdsController extends Controller
{

    protected $video_ads;
    protected $dynamic_block;

    public function __construct(VideoAdsInterface $video_ads, BlockSectionInterface $dynamic_block) 
    {
        $this->video_ads = $video_ads;
        $this->dynamic_block = $dynamic_block;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */

    public function index(Request $request)
    { 
        $search = $request->all();
        $data['ads_info'] = $this->video_ads->findAll($limit= 50,$search);  
        return view('videoads::video_ads.index',$data);
    }


    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $data['is_edit'] = false;
        $data['categories'] = $this->dynamic_block->findAll()->pluck('block_section','id');
        return view('videoads::video_ads.create',$data);
    }
    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(VideoAdsRequest $request)
    {
        ini_set('file_uploads', 'On');
        ini_set('upload_tmp_dir', '/tmp');
        ini_set('upload_max_filesize', 1024);
        ini_set('post_max_size', 1024);

        $data = $request->all();
        $categories = $request->ads_category;

        $date = explode('-', $data['date_range']);
        $start_date_arr = array($date[0],$date[1],$date[2]);
        $start_date = implode('-', $start_date_arr);
        $end_date_arr = array($date[5],$date[6],$date[7]);
        $end_date = implode('-', $end_date_arr);
        try{
            $data['ads_category'] = json_encode($categories);
            $data['start_date'] =  $start_date;
            $data['end_date'] =  $end_date;

           if ($request->hasFile('video_ads_upload')) {
               $data['video_ads_upload'] = $this->video_ads->upload($data['video_ads_upload']);
           }

           $this->video_ads->save($data);

           alertify()->success('Video Ads Created Successfully');
       }catch(\Throwable $e){
           alertify($e->getMessage())->error();
       }
       
       return redirect(route('video_ads.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('videoads::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data['is_edit'] = true;
        $data['video_ads_info'] = $this->video_ads->find($id);
        $data['categories'] = $this->dynamic_block->findAll()->pluck('block_section','id');
        return view('videoads::video_ads.edit',$data);
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

       $categories = $request->ads_category;
        
       $date = explode('-', $data['date_range']);
       $start_date_arr = array($date[0],$date[1],$date[2]);
       $start_date = implode('-', $start_date_arr);
       $end_date_arr = array($date[5],$date[6],$date[7]);
       $end_date = implode('-', $end_date_arr);
        
        try{

            $data['ads_category'] = json_encode($categories);
            $data['start_date'] =  $start_date;
            $data['end_date'] =  $end_date;

           if ($request->hasFile('video_ads_upload')) {
               $data['video_ads_upload'] = $this->video_ads->upload($data['video_ads_upload']);
           }

            $this->video_ads->update($id,$data);

            alertify()->success('Video Ads Updated Successfully');
            
        }catch(\Throwable $e){
           alertify($e->getMessage())->error();
        }
        
        return redirect(route('video_ads.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        try{
            $this->video_ads->delete($id);
             alertify()->success('Video Ads Deleted Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
      return redirect(route('video_ads.index'));
    }
}
