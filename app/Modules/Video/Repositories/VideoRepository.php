<?php 
namespace App\Modules\Video\Repositories;

use App\Modules\Video\Entities\Video;
use App\Modules\Video\Entities\VideoCeleb;

class VideoRepository implements VideoInterface
{
    
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    { 
         $result =Video::when(array_keys($filter, true), function ($query) use ($filter) {

            if (isset($filter['search_val'])) { 
                $query->where('video_title', 'like', '%' . $filter['search_val'] . '%');
            }            

            if (isset($filter['video_type'])) { 
                $query->where($filter['video_type'],'=','1');
            }

            if (isset($filter['genre'])) { 
                $query->where('genre_id','=',$filter['genre']);
            }

           
        })->orderBy('id', $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        
        return $result; 
        
    }
    
    public function find($id){
        return Video::find($id);
    }
    
    public function findVideoCeleb($id){
        return VideoCeleb::where('video_id','=',$id)->get();
    }
    
   public function getList(){  
       $result = Video::where('status','=','1')->pluck('video_title', 'id');
       return $result;
   }
    
    public function save($data){
        return Video::create($data);
    }

    public function saveCelebrityVideo($data){
        return VideoCeleb::create($data);
    }
    
    public function update($id,$data){
        $result = Video::find($id);
        return $result->update($data);
    }
    
    public function delete($id){
        $result = Video::find($id);
        return $result->delete();
    }
    
    public function deleteCelebrityVideo($id){
        $result = VideoCeleb::where('video_id','=',$id)->delete();
    }
    
    public function upload($file){
        
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . Video::FILE_PATH, $fileName);

        return $fileName;
   }

    public function getVideoByType($type, $limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]){
         $result =Video::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->where($type,'=','1')->orderBy('id', $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        
        return $result; 
    }

    public function getArtistRelatedVideo($video_id,$celebs,$limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]){

        $result =VideoCeleb::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->whereIn('celebrity_id', $celebs['cel_id'])->where('video_id','!=',$video_id)->orderBy('id', $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        
        return $result; 
    }

    public function getAllBySection($block_id,$limit=null,$filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]){
       $result =Video::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->where('display_block_section','=',$block_id)->orderBy('id', $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        
        return $result;
    }

    public function getTrendingVideos($limit=null,$filter = [], $sort = ['by' => 'total_views', 'sort' => 'DESC'], $status = [0, 1]){
         $result =Video::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->orderBy('total_views', $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        
        return $result;
    }


}
