<?php

namespace App\Modules\Video\Repositories;

interface VideoInterface
{
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function find($id);
    public function findVideoCeleb($id);

    public function getList();

    public function save($data);
    public function saveCelebrityVideo($data);

    public function update($id, $data);

    public function delete($id);
    public function deleteCelebrityVideo($id);

    public function upload($file);

    public function getVideoByType($type, $limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function getArtistRelatedVideo($video_id, $celebs, $limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function getAllBySection($block_id, $limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function getByGenre($block_id, $genre_id, $limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function getTrendingVideos($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);
}
