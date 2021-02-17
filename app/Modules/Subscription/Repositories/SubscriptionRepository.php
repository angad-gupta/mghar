<?php

/**
 * Created by PhpStorm.
 * User: bidhee
 * Date: 8/1/19
 * Time: 4:27 PM
 */

namespace App\Modules\Subscription\Repositories;

use App\Modules\Subscription\Entities\Subscription;
use App\Modules\Subscription\Entities\SubscriptionPayment;

class SubscriptionRepository implements SubscriptionInterface
{

    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'ASC'], $status = [0, 1])
    {
        $result =Subscription::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
        
    } 
    
    public function findPayment(){
         return SubscriptionPayment::first();
    }

    public function find($id){
        return Subscription::find($id);
    }
    
   public function getList(){  
       $banner = Subscription::pluck('block_section', 'id');
      
       return $banner;
   }
    
    public function save($data){
        return Subscription::create($data);
    }

    public function savePayment($data){
        return SubscriptionPayment::create($data);
    }
    
    public function update($id,$data){
        $result = Subscription::find($id);
        return $result->update($data);
    }
    
    public function delete($id){
        $result = Subscription::find($id);
        return $result->delete();
    }

}
