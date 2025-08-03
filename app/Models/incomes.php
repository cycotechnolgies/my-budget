<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class incomes extends Model
{
    protected $fillable = [
        'title',
        'amount',
        'Rec_date',
        'notes',
    ];
    /** @use HasFactory<\Database\Factories\IncomesFactory> */
    use HasFactory;
}
