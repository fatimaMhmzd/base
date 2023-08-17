<?php

namespace Modules\Rateing\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Rateing extends Model
{
    use HasFactory;


    protected $table = 'rateings_polymorphism';


    protected $fillable = [
        'user_id',
        'title',
        'description',
        'rating',
    ];

    protected $hidden=[
//        'id',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'title' => 'string',
        'description' => 'string',
        'rating' => 'integer',

    ];
    protected $with = ["user"];

    public function rateable(): MorphTo
    {
        return $this->morphTo();
    }
    public function user(): HasOne
    {
        return $this->hasOne(User::class, "id","user_id");
    }
}
