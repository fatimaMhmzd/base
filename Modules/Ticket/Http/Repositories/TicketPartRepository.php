<?php

namespace Modules\Ticket\Http\Repositories;

use App\Http\Repository\BaseRepository;
use Modules\Ticket\Entities\TicketPart;

class TicketPartRepository extends BaseRepository
{
    public function model(): string
    {
        return TicketPart::class;
    }

    public function relations(): array
    {
        return [];
    }
}
