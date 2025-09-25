<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;

use Illuminate\Database\Eloquent\Model;

class Widyaiswara extends Model
{
    use HasUlids;
    protected $fillable = [
        'nip',
        'nama',
        'satker',
        'no_telp',
        'email',
        'alamat',
    ];

    protected $keyType = 'string';

    public $incrementing = false;
}
