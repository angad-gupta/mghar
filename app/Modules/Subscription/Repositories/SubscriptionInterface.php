<?php

/**
 * Created by PhpStorm.
 * User: bidhee
 * Date: 8/1/19
 * Time: 4:26 PM
 */

namespace App\Modules\Subscription\Repositories;

interface SubscriptionInterface
{

    public function findAll($limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function findPayment();
    
    public function find($id);
    
    public function getList();
    
    public function save($data);
    public function savePayment($data);

    public function update($id,$data);

    public function delete($id);
    

}
