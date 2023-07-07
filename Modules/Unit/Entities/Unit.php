<?php

namespace Modules\Unit\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Unit extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = "units";

    protected $fillable = ["title","description"];

    protected $casts = [
        "title" => "string"
    ];
}
