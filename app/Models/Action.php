<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'date' => 'date',
        'data' => 'json',
    ];

    protected $appends = ['formattedDate'];

    public function getFormattedDateAttribute() {

        return $this->date->format('Y-m-d');
    }
}
