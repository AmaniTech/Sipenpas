<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    protected $table = 'penilaian';
    protected $guarded = ['id'];

    public function grup()
    {
        return $this->belongsTo(Grup::class);
    }

    public function juri()
    {
        return $this->belongsTo(Juri::class);
    }

    public function subkategori()
    {
        return $this->belongsTo(SubKategori::class);
    }

    public function items()
    {
        return $this->hasMany(PenilaianItem::class, 'penilaian_id');
    }

    public function penilaianadministrasi()
    {
        return $this->hasMany(PenilaianAdministrasi::class);
    }


}
