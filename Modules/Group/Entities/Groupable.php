<?php

namespace Modules\Group\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Modules\Blog\Entities\Blog;

class Groupable extends Model
{
    use HasFactory;

    protected $table = 'groups_polymorphism';

    protected $fillable = [
        'groupable_type',
        'groupable_id',
        'group_id',
        'created_at',
        'updated_at',
    ];

/*    public function groupable(): MorphMany
    {
        return $this->morphMany();
    }*/

}
