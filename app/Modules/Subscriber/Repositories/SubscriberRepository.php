<?php
namespace App\Modules\Subscriber\Repositories;

use App\Modules\Subscriber\Entities\Subscriber;
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

    public function checkProviderId($provider_id_field,$provider_id_val){
        return Subscriber::where('provider_id', $getInfo->id)->first();
    }


}
