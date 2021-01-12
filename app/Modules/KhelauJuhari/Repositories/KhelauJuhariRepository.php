<?php 
namespace App\Modules\KhelauJuhari\Repositories;

use App\Modules\KhelauJuhari\Entities\KhelauJuhari;

class KhelauJuhariRepository implements KhelauJuhariInterface
{
    
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    { 
         $result =KhelauJuhari::when(array_keys($filter, true), function ($query) use ($filter) {

        })->orderBy('id', $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        
        return $result; 
        
    }

    public function findRelatedVideo($videoid, $limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]){
         $result =KhelauJuhari::when(array_keys($filter, true), function ($query) use ($filter) {

        })->where('id','!=',$videoid)->orderBy('id', $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        
        return $result; 
    }

    
    public function find($id){
        return KhelauJuhari::find($id);
    }

   public function getList(){  
       $result = KhelauJuhari::where('status','=','1')->pluck('kj_title', 'id');
       return $result;
   }
    
    public function save($data){
        return KhelauJuhari::create($data);
    }

    public function update($id,$data){
        $result = KhelauJuhari::find($id);
        return $result->update($data);
    }
    
    public function delete($id){
        $result = KhelauJuhari::find($id);
        return $result->delete();
    }
    
    public function upload($file){
        
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . KhelauJuhari::FILE_PATH, $fileName);

        return $fileName;
   }

}
