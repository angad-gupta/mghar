<?php

namespace App\Modules\Subscriber\Repositories;

interface SubscriberInterface
{
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function findAllArchives($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function find($id);

    public function getList();

    public function save($data);

    public function update($id, $data);

    public function delete($id);

    public function checkProviderId($provider_id_val);


    public function checkwishlistVideo($videoId);
    public function addWishlist($data);
    public function removeWishlist($videoId);
    public function getWishlistById($id, $limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);


}
