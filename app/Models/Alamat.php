<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    use HasFactory;

    protected $fillable = [
        'npm',
        'alamat',
        'province',
        'regency',
        'district',
        'village',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'npm', 'id');
    }
}
