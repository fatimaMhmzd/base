<?php

namespace Modules\Size\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Size extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        "unit_id",
        "title",
        "sub_title",
        "description",
    ];




}
