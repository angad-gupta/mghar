<?php

namespace App\Modules\Home\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Modules\Genre\Repositories\GenreInterface;
use App\Modules\Video\Repositories\VideoInterface;
use App\Modules\Blog\Repositories\BlogInterface;


class HomeController extends Controller
{

    protected $video;
    protected $genre;
    protected $blog;
    
    public function __construct(VideoInterface $video, GenreInterface $genre, BlogInterface $blog)
    {
        $this->video = $video;
        $this->genre = $genre;
        $this->blog = $blog;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data['popular_videos'] = $this->video->getVideoByType('is_popular',$limit= 20);
        $data['trending_videos'] = $this->video->getVideoByType('is_trending',$limit= 20);
        $data['latest_videos'] = $this->video->findAll($limit = 20);
        $data['blog_info'] = $this->blog->findAllActiveBlog($limit= 20);  
        $data['genre'] = $this->genre->getList();

        return view('home::index', $data);
    }

    public function Videos(Request $request){

        $search = $request->all();  
        $data['videos'] = $this->video->findAll($limit = 24,$search);
        $data['genre'] = $this->genre->getList();

        if (array_key_exists('genre', $search)) {
             $data['genre_search'] = $search;
        } else {
            $data['genre_search'] = '';
        }

        return view('home::video-lists', $data);
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

        //Artist Related
        $celebrities = $this->video->findVideoCeleb($video_id); 

        $celebrityIds = array();
        foreach ($celebrities as $key => $value) {
            
            $cel_id = $value->celebrity_id;
            array_push($celebrityIds, $cel_id);
        }
        $celebDatas['cel_id'] = $celebrityIds;
        $data['artist_related'] = $this->video->getArtistRelatedVideo($video_id,$celebDatas,$limit= 20); 

        $data['video_id'] = $video_id;
        $data['featured_videos'] = $this->video->getVideoByType('is_featured',$limit= 20);

        return view('home::video-detail', $data);
    }

    public function BlogDetail(Request $request){

        $input = $request->all();

        $blog_id = $input['blog_id'];

        $data['blog_detail'] = $this->blog->find($blog_id);
        $data['related_blog'] = $this->blog->findRelatedBlog($blog_id);  

        $data['blog_id'] = $blog_id;

        return view('home::blog-detail', $data);

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
