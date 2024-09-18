<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'gender',
        'phone',
        'address',
        'image',
        'room_id'
    ];

    protected $dates = ['deleted_at'];

    public function room(){
      return $this->belongsTo(Room::class);
    }
}
