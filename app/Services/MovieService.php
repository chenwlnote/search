<?php
/**
 * movie 服务类
 * User: Dave
 * Date: 2017/4/2
 * Time: 12:35
 */

namespace App\Services;


use App\Models\MovieModel;

class MovieService
{
    public static function doInsert(array $data = [] )
    {
        MovieModel::insert($data);
    }

    public static function doFindById(int $id)
    {
        return MovieModel::first($id);
    }

    public static function doUpdate(int $id ,array $data = [] )
    {
        MovieModel::where('id',$id)->update($data);
    }
}