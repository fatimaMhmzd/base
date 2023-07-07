<?php

namespace Modules\Ticket\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        "user_id",
        "part_id",
        "priority",
        "title",
        "status",
    ];
    protected $relations = ["tickets","user"];


    /**
     * @return HasMany
     */
    public function tickets(): HasMany
    {
        return $this->hasMany(TicketBody::class, "ticket_id");
    }


    /**
     * @return HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class, "id", "user_id");
    }
}
