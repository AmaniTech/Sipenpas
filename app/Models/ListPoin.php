<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListPoin extends Model
{
    protected $table = 'list_poin';
    protected $guarded = ['id'];

    public function sub_kategori()
    {
        return $this->belongsTo(SubKategori::class);
    }
}
