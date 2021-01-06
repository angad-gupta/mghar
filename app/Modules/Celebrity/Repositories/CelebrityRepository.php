<?php 
namespace App\Modules\Celebrity\Repositories;

use App\Modules\Celebrity\Entities\Celebrity;
use App\Modules\Celebrity\Entities\CelebrityAward;
use DB;
class CelebrityRepository implements CelebrityInterface
{
    
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    { 
         $result =Celebrity::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->orderBy('id', $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        
        return $result; 
        
    }
    
    public function find($id){
        return Celebrity::find($id);
    }
    
   public function getList(){  
       $result = Celebrity::select("id", DB::raw("CONCAT(first_name,' ',last_name) AS full_name"))->pluck('full_name', 'id');
       return $result;
   }
    
    public function save($data){
        return Celebrity::create($data);
    }    

    public function saveCelebrityAward($data){
        return CelebrityAward::create($data);
    }
    
    public function update($id,$data){
        $result = Celebrity::find($id);
        return $result->update($data);
    }
    
    public function delete($id){
        $result = Celebrity::find($id);
        return $result->delete();
    }    

    public function deleteCelebrityAward($id){
        $result = CelebrityAward::where('celebrity_id','=',$id)->delete();
    }

    public function upload($file){
        
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . Celebrity::FILE_PATH, $fileName);

        return $fileName;
   }

    public function uploadAward($file){
        
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . CelebrityAward::FILE_PATH, $fileName);

        return $fileName;
   }
}