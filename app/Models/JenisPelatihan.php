<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;

use Illuminate\Database\Eloquent\Model;

class JenisPelatihan extends Model
{
    use HasUlids;
    protected $fillable = [
        'nama',
        'deskripsi',
        'slug',

    ];

    protected $keyType = 'string';

    public $incrementing = false;
    protected static function booted()
    {
        static::creating(function ($model) {
            $model->slug = str($model->nama)->slug();
        });
    }
    
}
