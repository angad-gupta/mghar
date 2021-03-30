<?php

namespace App\Modules\SearchLog\Repositories;

use App\Modules\SearchLog\Entities\SearchLog;
use App\Modules\SearchLog\Repositories\SearchLogInterface;

class SearchLogRepository implements SearchLogInterface
{

    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result = SearchLog::when(array_keys($filter, true), function ($query) use ($filter) {
        })->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result;
    }

    public function find($id)
    {
        return SearchLog::find($id);
    }

    public function getList()
    {
        $result = SearchLog::pluck('title', 'id');

        return $result;
    }

    public function save($data)
    {
        return SearchLog::create($data);
    }

    public function update($id, $data)
    {
        $result = SearchLog::find($id);
        return $result->update($data);
    }

    public function delete($id)
    {
        $result = SearchLog::find($id);
        return $result->delete();
    }
}
