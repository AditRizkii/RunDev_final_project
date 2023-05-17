<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pengirim',
        'id_penerima',
        'subject',
        'pesan',
        'name',
        'file',
        'extension',
        'size',
        'mime',
    ];
}
