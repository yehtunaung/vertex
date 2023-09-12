<?php

namespace App\Models;

use App\Models\User;
use App\Traits\Auditable;
use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usage extends Model
{
    use HasFactory;
    use SoftDeletes;
    use MultiTenantModelTrait;
    use Auditable;

    public $table = 'usages';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'date',
        'particular',
        'product',
        'item_no',
        'qty',
        'used_person',
        'remark',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    public function store_list()
    {
        return $this->belongsTo(StoreList::class, 'particular');
    }
}
