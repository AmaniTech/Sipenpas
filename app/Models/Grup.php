<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grup extends Model
{
    protected $table = 'grup';
    protected $guarded = ['id'];

    public function peserta()
    {
        return $this->hasMany(Peserta::class);
    }
}
