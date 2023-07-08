<?php

namespace Modules\Blog\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Polymorphism\Entities\Images;

class Blog extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = "blogs";

    protected $fillable = [
        "group_id",
        "creator_user_id",
        "updator_user_id",
        "title",
        "sub_title",
        "link",
        "slug",
        "description",
        "content"
    ];

    protected $casts = [
        "group_id" => "integer",
        "creator_user_id" => "integer",
        "updator_user_id" => "integer",
        "title" => "string",
        "sub_title" => "string",
        "link" => "string",
        "slug" => "string",
        "description" => "string",
        "content" => "string"
    ];
    protected $with = ["image" , "group" , "user" ,"lables"];

    public function image(): MorphMany
    {
        return $this->morphMany(Images::class, 'imageable');
    }

    public function group(): HasOne
    {
        return $this->hasOne(BlogGroup::class, "id", "group_id");
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class, "id", "creator_user_id");
    }

    public function lables(): BelongsToMany
    {
        return $this->belongsToMany(Lable::class,"blog_lables","blog_id","lable_id");
    }

}