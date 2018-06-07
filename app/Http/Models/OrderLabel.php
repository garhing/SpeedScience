<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 文章
 * Class Article
 *
 * @package App\Http\Models
 */
class OrderLabel  extends Model
{
    protected $table = 'order_label';
    protected $primaryKey = 'id';
    public $timestamps = false;

}