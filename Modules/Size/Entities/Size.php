<?php

namespace Modules\Size\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Unit\Entities\Unit;

class Size extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = "sizes";

    protected $fillable = [
        "unit_id",
        "title",
        "sub_title",
        "description",
    ];
    protected $with = ["unit"];
    public function unit(): HasOne
    {
        return $this->hasOne(Unit::class, "id", "unit_id");
    }



}
