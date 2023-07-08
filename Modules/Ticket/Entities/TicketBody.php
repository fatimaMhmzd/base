<?php

namespace Modules\Ticket\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class TicketBody extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        "creator_id",
        "ticket_id",
        "body",
        "status",
    ];
    protected $relations = ["tickets","user"];


    /**
     * @return HasOne
     */
    public function tickets(): HasOne
    {
        return $this->hasOne(Ticket::class, "id","ticket_id");
    }


    /**
     * @return HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class, "id", "creator_id");
    }
}
