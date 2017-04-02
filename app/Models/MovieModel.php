<?php
/**
 * Created by PhpStorm.
 * User: Dave
 * Date: 2017/4/2
 * Time: 12:33
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class MovieModel extends Model
{
    protected $table = 'movie';


    protected $fillable = [
        'title',
        'time',
        'score',
        'source',
    ];

    protected $dateFormat = 'U';

}