<?php

namespace App\Models;

use Dyrynda\Database\Support\GeneratesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GridListItem extends Model
{
    use HasFactory, GeneratesUuid;

    protected $guarded = ['id', 'uuid', 'created_at'];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function list() {
        return $this->hasOne(GridList::class);
    }

}