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

    public function getLevelAttribute($value)
    {
        switch ($value) {
            case 1:
                return 'SK';
            case 2:
                return 'K';
            case 3:
                return 'C';
            case 4:
                return 'B';
            case 5:
                return 'A';
            default:
                return '-'; // untuk nilai yang tidak valid
        }
    }
}
