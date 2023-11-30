<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transcation extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        "transcation_name",
        "booking_id",
    ];


}
