<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lable extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = "lables";

    protected $fillable = [
        "title",
        "link",
        "slug",
    ];

    protected $casts = [
        "title" => "string",
        "link" => "string",
        "slug" => "string",
    ];

}
