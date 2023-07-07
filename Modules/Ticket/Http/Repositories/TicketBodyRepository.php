<?php

namespace Modules\Ticket\Http\Repositories;

use App\Http\Repository\BaseRepository;
use Modules\Ticket\Entities\TicketBody;

class TicketBodyRepository extends BaseRepository
{
    public function model(): string
    {
        return TicketBody::class;
    }

    public function relations(): array
    {
        return ['tickets','user'];
    }
}
