<?php

namespace App\Models;

use Dyrynda\Database\Support\GeneratesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GridList extends Model {
    use HasFactory, GeneratesUuid;

    protected $guarded = [ 'id', 'uuid', 'created_at' ];

    protected $casts = [
        'map' => 'array'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
        'user_id',
    ];

    public function getRouteKeyName() {
        return 'uuid';
    }

    public function items() {
        return $this->hasMany( GridListItem::class );
    }
}
