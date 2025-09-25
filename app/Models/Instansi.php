<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;

use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    use HasUlids;
    protected $fillable = [
        'nama_instansi',
        'alamat',
        'no_telp',
        'email',
        'website',
    ];
    
    protected $keyType = 'string';

    public $incrementing = false;
}
