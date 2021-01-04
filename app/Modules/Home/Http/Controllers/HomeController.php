<?php

namespace App\Modules\Home\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Modules\Genre\Repositories\GenreInterface;
use App\Modules\Video\Repositories\VideoInterface;


class HomeController extends Controller
{

    protected $video;
    protected $genre;
    
    public function __construct(VideoInterface $video, GenreInterface $genre)
    {
        $this->video = $video;
        $this->genre = $genre;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data['popular_videos'] = $this->video->getVideoByType('is_popular',$limit= 20);
        $data['trending_videos'] = $this->video->getVideoByType('is_trending',$limit= 20);
        $data['latest_videos'] = $this->video->findAll($$limit = 20);
        $data['genre'] = $this->genre->getList();

        return view('home::index', $data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function VideoDetail(Request $request)
    {
        $input = $request->all();

        $video_id = $input['video_id'];

        $data['video_detail'] = $videoInfo = $this->video->find($video_id);

        $videoView = $videoInfo->total_views;
        $newCount = $videoView + 1;

        $video_data = array(
            'total_views' => $newCount
        );

        $this->video->update($video_id,$video_data);

        $data['video_id'] = $video_id;

        return view('home::video-detail', $data);
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
        return view('home::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('home::edit');
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
        //
    }
}
