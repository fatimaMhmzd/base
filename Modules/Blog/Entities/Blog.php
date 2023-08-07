<?php

namespace Modules\Blog\Entities;

use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Comment\Entities\Comment;
use Modules\Polymorphism\Entities\Images;

class Blog extends Model
{
    use HasFactory,SoftDeletes,Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
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
    protected $with = ["image", "comments" , "user" ,"lables"];
    protected $appends = ['date_shamsi'];
    public function image(): MorphOne
    {
        return $this->morphOne(Images::class, 'imageable');
    }

    public function group(): HasOne
    {
        return $this->hasOne(BlogGroup::class, "id", "group_id");
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "creator_user_id");
    }

    public function lables(): BelongsToMany
    {
        return $this->belongsToMany(Lable::class,"blog_lables","blog_id","lable_id");
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function getDateShamsiAttribute()
    {
        $date= Blog::query()->find($this->id)->created_at;

        return verta($date)->format('%B %d، %Y');
    }
}
