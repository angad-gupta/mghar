<?php 
namespace App\Modules\VideoAds\Repositories;

use App\Modules\VideoAds\Entities\VideoAds;

class VideoAdsRepository implements VideoAdsInterface
{
     
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result =VideoAds::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
        
    } 

    public function findAllActiveVideoAds($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result =VideoAds::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->where('status','=','1')->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
        
    }

    public function findVideoAdsCategory($category)
    {
        $now = date('Y-m-d');
        $result = VideoAds::where('ads_category', 'like', '%"' .$category .'"%' )->where('status','=',1)->where('start_date','<=',$now)->where('end_date','>=',$now)->inRandomOrder()->first();
        return $result;
    }

    public function find($id){
        return VideoAds::find($id);
    }
    
   public function getList(){  
       $result = VideoAds::pluck('ads_title', 'id');
       return $result;
   }
    
    public function save($data){
        return VideoAds::create($data);
    }
    
    public function update($id,$data){
        $result = VideoAds::find($id);
        return $result->update($data);
    }
    
    public function delete($id){
        $result = VideoAds::find($id);
        return $result->delete();
    }
    
   public function upload($file){
        
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . VideoAds::FILE_PATH, $fileName);

        return $fileName;
   }

    public function getAdsByCategory($category_title){
        return VideoAds::where('ads_category','=',$category_title)->where('status','=','1')->first();
    }  

}