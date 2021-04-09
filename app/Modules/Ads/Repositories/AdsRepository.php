<?php 
namespace App\Modules\Ads\Repositories;

use App\Modules\Ads\Entities\Ads;

class AdsRepository implements AdsInterface
{
     
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result =Ads::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
        
    } 

    public function findAllActiveAds($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result =Ads::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->where('status','=','1')->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
        
    }
    
    public function find($id){
        return Ads::find($id);
    }
    
   public function getList(){  
       $result = Ads::pluck('ads_title', 'id');
      
       return $result;
   }
    
    public function save($data){
        return Ads::create($data);
    }
    
    public function update($id,$data){
        $result = Ads::find($id);
        return $result->update($data);
    }
    
    public function delete($id){
        $result = Ads::find($id);
        return $result->delete();
    }
    
   public function upload($file){
        
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . Ads::FILE_PATH, $fileName);

        return $fileName;
   }

    public function getAdsByCategory($category_title){
        return Ads::where('ads_category','=',$category_title)->where('status','=','1')->first();
    }  

}