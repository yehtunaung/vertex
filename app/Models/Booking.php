<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        "name",
        "email",
        "phone",
        "adults",
        "children",
        "booking_time",
        "check_in_time",
        "check_out_time"
    ];
}
