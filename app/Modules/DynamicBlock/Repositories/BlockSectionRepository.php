<?php 
namespace App\Modules\DynamicBlock\Repositories;

use App\Modules\DynamicBlock\Entities\BlockSection;

class BlockSectionRepository implements BlockSectionInterface
{
     
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'sort_order', 'sort' => 'ASC'], $status = [0, 1])
    {
        $result =BlockSection::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
        
    } 
    
    public function find($id){
        return BlockSection::find($id);
    }
    
   public function getList(){  
       $banner = BlockSection::pluck('block_section', 'id');
      
       return $banner;
   }
    
    public function save($data){
        return BlockSection::create($data);
    }
    
    public function update($id,$data){
        $banner = BlockSection::find($id);
        return $banner->update($data);
    }
    
    public function delete($id){
        $banner = BlockSection::find($id);
        return $banner->delete();
    }
    
   public function upload($file){
        
        $imageName = $file->getClientOriginalName();
        
        if($imageName){
            $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);
            $file->move(public_path() . BlockSection::FILE_PATH, $fileName);
            return $fileName;
        }

   }

}