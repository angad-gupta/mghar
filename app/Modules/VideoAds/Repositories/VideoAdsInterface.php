<?php

namespace App\Modules\VideoAds\Repositories;

interface VideoAdsInterface
{
    public function findAll($limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);
    
    public function findAllActiveVideoAds($limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function findVideoAdsCategory($category);
    
    public function find($id);
    
    public function getList();
    
    public function save($data);

    public function update($id,$data);

    public function delete($id);
    
    public function upload($file);

 	public function getAdsByCategory($category_title);

}