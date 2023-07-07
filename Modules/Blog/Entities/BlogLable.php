<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogLable extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = "blog_lables";

    protected $fillable = [
        "lable_id",
        "blog_id",
    ];

    protected $casts = [
        "lable_id" => "integer",
        "blog_id" => "integer",

    ];

}
