<?php
namespace App\Modules\Subscriber\Repositories;

use App\Modules\Subscriber\Entities\Subscriber;
use App\Modules\Subscriber\Entities\SubscriberWishlist;
use App\Modules\Subscriber\Entities\SubscriberPlan;
use App\Modules\Subscriber\Entities\SubscriberPayment;
use DB;

class SubscriberRepository implements SubscriberInterface
{

    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result = Subscriber::when(array_keys($filter), function ($query) use ($filter) {


        })->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));

        return $result;

    }

    public function findAllArchives($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result = Subscriber::when(array_keys($filter), function ($query) use ($filter) {


        })->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));

        return $result;

    }


    public function find($id)
    {
        return Subscriber::find($id);
    }

    public function getList()
    {
        $team = Subscriber::pluck('full_name', 'id');
        return $team;
    }

    public function save($data)
    {
        return Subscriber::create($data);
    }

    public function update($id, $data)
    {
        $result = Subscriber::find($id);
        return $result->update($data);
    }

    public function delete($id)
    {
        $result = Subscriber::find($id);
        return $result->delete();
    }

    public function checkProviderId($provider_id_val){
        return Subscriber::where('provider_id', $provider_id_val)->first();
    }


    public function checkwishlistVideo($videoId){
        return SubscriberWishlist::where('video_id','=',$videoId)->count();
    }

    public function addWishlist($data){
        return SubscriberWishlist::create($data);
    }

    public function removeWishlist($videoId){
        return SubscriberWishlist::where('video_id','=',$videoId)->delete();
    }

    public function getWishlistById($id, $limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]){
         $result =SubscriberWishlist::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->where('subscriber_id','=',$id)->orderBy('id', $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        
        return $result; 
    }

    public function getSubscriberPlan($subscriberID){
        return SubscriberPlan::where('subscriber_id','=',$subscriberID)->where('status','=','active')->first();
    }

    public function getMembershipDate($subscriberID){
        return SubscriberPlan::select('date')->where('subscriber_id','=',$subscriberID)->where('status','=','expired')->orderBy('id', 'ASC')->first();
    }

    public function updatePlanStatus($id, $data){
        $result = SubscriberPlan::where('subscriber_id','=',$id)->update($data);
    }

    public function updatePaymentStatus($id, $data){
        $result = SubscriberPayment::where('subscriber_id','=',$id)->update($data);
    }

    public function insertPlanData($data){
        return SubscriberPlan::create($data);
    }
    
    public function insertPaymentData($data){
        return SubscriberPayment::create($data);
    }

    public function getSubscriberPurchase($id,$limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]){
        $result =SubscriberPayment::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->where('subscriber_id','=',$id)->orderBy('id', $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        
        return $result; 
    }

}
