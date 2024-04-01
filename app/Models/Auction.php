<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Auction extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'starting_bid',
        'highest_bid',
        'end_date',
        'user_id'
    ];
    use SoftDeletes;

    protected $casts = [
        'deleted_at' => 'datetime',
    ];


}
