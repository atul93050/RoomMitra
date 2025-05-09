<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FurnitureItem extends Model
{use HasFactory;

    protected $fillable = [
        'room_id',
        'item_name',
        'item_type',  
    ];

    /**
     * Relationship: Each furniture item belongs to one room.
     */
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'room_id');
    }

}
