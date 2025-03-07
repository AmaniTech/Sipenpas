<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenilaianItem extends Model
{
    protected $table = 'penilaianitem';
    protected $guarded = ['id'];

    public function penilaian()
    {
        return $this->belongsTo(Penilaian::class, 'penilaian_id');
    }
}
