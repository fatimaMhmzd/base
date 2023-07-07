<?php

namespace Modules\Ticket\Http\Repositories;

use App\Http\Repository\BaseRepository;
use Modules\Ticket\Entities\Ticket;

class TicketRepository extends BaseRepository
{
    public function model(): string
    {
        return Ticket::class;
    }

    public function relations(): array
    {
        return ['ticket_parts','user'];
    }
}
