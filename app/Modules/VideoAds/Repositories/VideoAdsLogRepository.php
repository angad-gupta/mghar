<?php 
namespace App\Modules\VideoAds\Repositories;

use App\Modules\VideoAds\Entities\VideoAdsLog;
use DB;

class VideoAdsLogRepository implements VideoAdsLogInterface
{
     
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
    
        $result = VideoAdsLog::when(array_keys($filter), function ($query) use ($filter) {

            if (isset($filter['search_value']) && !empty($filter['search_value'])) {
                $query->where(function ($q) use ($filter) {
                    $q->orwhere('video_name', 'like', '%' . $filter['search_value'] . '%');
                    $q->orwhere('video_ads_name', 'like', '%' . $filter['search_value'] . '%');
                    $q->orWhere('username', 'like', '%' . $filter['search_value'] . '%');
                    $q->orWhere('ip_address', 'like', '%' . $filter['search_value'] . '%');
        
                });

            }  

            if (isset($filter['start_date']) && !empty($filter['start_date']) && isset($filter['end_date']) && !empty($filter['end_date'])) {
                $query->whereBetween('created_at' ,[ $filter['start_date']." 00:00:00", $filter['end_date']." 23:59:59"]);
            }           

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