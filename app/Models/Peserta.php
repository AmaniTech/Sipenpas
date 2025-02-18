<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $table = 'peserta';
    protected $guarded = ['id'];

    public function grup()
    {
        return $this->belongsTo(Grup::class);
    }

    public function listPoin()
    {
        return $this->hasMany(ListPoin::class);
    }
}
