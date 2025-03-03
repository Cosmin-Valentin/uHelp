<?php

namespace App\Models\UHelp;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function tickets() {
        $this->hasMany(Ticket::class, 'category_id');
    }
}
