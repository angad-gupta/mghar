<?php 
namespace App\Modules\VideoAds\Repositories;

use App\Modules\VideoAds\Entities\VideoAdsLog;

class VideoAdsLogRepository implements VideoAdsLogInterface
{
     
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result =VideoAdsLog::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
      
        
    } 
    
    public function find($id){
        return VideoAdsLog::find($id);
        
    }
    
    public function findVideoAdsLog($id){
        return VideoAdsLog::where('video_id','=',$id)->first();
    }
    
    
    public function save($data){
        return VideoAdsLog::create($data);
    }
    
    public function update($id,$data){
        $result = VideoAdsLog::find($id);
        return $result->update($data);
    }
    
    public function delete($id){
        $result = VideoAdsLog::find($id);
        return $result->delete();
    }


}