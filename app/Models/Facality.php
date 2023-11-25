<?php


namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Facality extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasFactory;

    public $table = 'facalities';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'facality_type_id',
        'facality_name',
        'icon',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function faclityType()
    {
        return $this->belongsTo(FacalityType::class);
    }
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
