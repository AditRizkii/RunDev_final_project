<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bio extends Model
{
    use HasFactory;

    protected $fillable = [
        'npm',
        'minat',
        'bakat',
        'tentang',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'npm', 'id');
    }
}
