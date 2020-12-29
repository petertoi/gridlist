<?php

namespace App\Models;

use Dyrynda\Database\Support\GeneratesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GridListItem extends Model
{
    use HasFactory, GeneratesUuid;

    protected $guarded = ['id', 'uuid', 'created_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
        'grid_list_id',
    ];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    protected $casts = [
        'meta' => 'array',
    ];

    public function list()
    {
        return $this->hasOne(GridList::class);
    }

}
