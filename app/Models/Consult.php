<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consult extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'symptoms',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function animal()
    {
        return $this->belongsTo('App\Models\Animal');
    }
}
