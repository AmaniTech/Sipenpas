<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenilaianAdministrasi extends Model
{
    protected $table = 'penilaianadministrasi';

    protected $guarded = ['id'];

    public function administrasi()
    {
        return $this->belongsTo(Administrasi::class);
    }

    public function penilaian()
    {
        return $this->belongsTo(Penilaian::class);
    }
}
