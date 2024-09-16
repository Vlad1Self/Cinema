<?php

namespace Database\Seeders;

use App\Domain\Models\Ticket\Ticket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    public function run(): void
    {
        if (Ticket::count() == 0) {
            Ticket::factory(100)->create();
        }
    }
}
