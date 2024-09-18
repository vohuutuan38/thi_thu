<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name_room',
        'hinh_anh',
    ];

    protected $dates = ['deleted_at'];

    public function students(){
       return $this->hasMany(Student::class);
    }
}
