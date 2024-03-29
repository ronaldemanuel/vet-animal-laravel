<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'race',
        'age',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function consults()
    {
        return $this->hasMany('App\Models\Consults');
    }
}
