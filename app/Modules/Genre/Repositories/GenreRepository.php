<?php 
namespace App\Modules\Genre\Repositories;

use App\Modules\Genre\Entities\Genre;

class GenreRepository implements GenreInterface
{
    
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    { 
         $result =Genre::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->orderBy('id', $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        
        return $result; 
        
    }
    
    public function find($id){
        return Genre::find($id);
    }
    
   public function getList(){  
       $result = Genre::pluck('genre_title', 'id');
       return $result;
   }
    
    public function save($data){
        return Genre::create($data);
    }
    
    public function update($id,$data){
        $result = Genre::find($id);
        return $result->update($data);
    }
    
    public function delete($id){
        $result = Genre::find($id);
        return $result->delete();
    }

}