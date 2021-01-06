<?php

namespace App\Modules\Celebrity\Repositories;

interface CelebrityInterface
{
    public function findAll($limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function find($id);
    
    public function getList();
    
    public function save($data);

    public function saveCelebrityAward($data);

    public function update($id,$data);

    public function delete($id);
    
    public function deleteCelebrityAward($id);

    public function upload($file);

    public function uploadAward($file);

}