<?php

namespace App\Modules\Video\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Modules\Video\Repositories\VideoInterface;
use App\Modules\Genre\Repositories\GenreInterface;
use App\Modules\Celebrity\Repositories\CelebrityInterface;

class VideoController extends Controller
{

    protected $video;
    protected $genre;
    protected $celebrity;
    
    public function __construct(VideoInterface $video, GenreInterface $genre, CelebrityInterface $celebrity)
    {
        $this->video = $video;
        $this->genre = $genre;
        $this->celebrity = $celebrity;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    { 
        $search = $request->all();
        $data['video_info'] = $this->video->findAll($limit= 50,$search);  
        return view('video::video.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $data['is_edit'] = false;
        $data['genre'] = $this->genre->getList();
        $data['celebrity'] = $this->celebrity->getList();  
        return view('video::video.create',$data);
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
            if ($request->hasFile('video_cover_image')) {
                $data['video_cover_image'] = $this->video->upload($data['video_cover_image']);
            }

            $videoInfo = $this->video->save($data);
            $video_id = $videoInfo->id;

            $celebrities = $data['celebrities'];
            $countname = sizeof($celebrities);
                for($i = 0; $i < $countname; $i++){
                    
                    if($data['celebrities'][$i]){
                         $celebVideo['video_id'] = $video_id;
                         $celebVideo['celebrity_id'] = $data['celebrities'][$i];

                         $this->video->saveCelebrityVideo($celebVideo);
                    }
                }

            alertify()->success('Video Created Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        
        return redirect(route('video.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('video::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data['is_edit'] = true;
        $data['genre'] = $this->genre->getList();
        $data['video_info'] = $this->video->find($id);
        $data['celebrity'] = $this->celebrity->getList();  
        return view('video::video.edit',$data);
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

            if ($request->hasFile('video_cover_image')) {
                $data['video_cover_image'] = $this->video->upload($data['video_cover_image']);
            }

            $this->video->update($id,$data);
            $video_id = $id;
            $this->video->deleteCelebrityVideo($video_id);

            $celebrities = $data['celebrities'];
            $countname = sizeof($celebrities);
                for($i = 0; $i < $countname; $i++){
                    
                    if($data['celebrities'][$i]){
                         $celebVideo['video_id'] = $video_id;
                         $celebVideo['celebrity_id'] = $data['celebrities'][$i];

                         $this->video->saveCelebrityVideo($celebVideo);
                    }
                }
             alertify()->success('Video Updated Successfully');
        }catch(\Throwable $e){
           alertify($e->getMessage())->error();
        }
        
        return redirect(route('video.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        try{
            $this->video->deleteCelebrityVideo($id);
            $this->video->delete($id);
             alertify()->success('Video Deleted Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
      return redirect(route('video.index'));
    }

}
