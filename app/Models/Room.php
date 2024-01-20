<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        "room_category_id",
        "avaliable",
        "room_no"
    ];

    public function roomCategory(){
        return $this->belongsTo(RoomCategory::class);
    }
    public function maxCapacity(){
        return $this->roomCategory()->max("capacity");
    }
}
