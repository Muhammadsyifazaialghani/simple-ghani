<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;

use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    use HasUlids;
    protected $fillable = [
        'nama_bidang',
    ];
    
    protected $keyType = 'string';

    public $incrementing = false;
}
