<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Peserta extends Model
{
    protected $table = 'peserta';
    protected $guarded = ['id'];
    use SoftDeletes;

    public function grup()
    {
        return $this->belongsTo(Grup::class);
    }

    public function listPoin()
    {
        return $this->hasMany(ListPoin::class);
    }
}
