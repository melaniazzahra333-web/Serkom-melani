<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Berita extends Model
{
    protected $table = 'berita';

    protected $primaryKey = 'id_berita';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'id_berita',
        'judul',
        'isi',
        'tanggal',
        'gambar',
        'status',
        'id_user',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($berita) {
            if (!$berita->id_berita) {
                $berita->id_berita = (string) Str::uuid();
            }
        });
    }

    protected static function booted()
{
    static::saving(function ($berita) {
        if (empty($berita->slug)) {
            $berita->slug = Str::slug($berita->judul);
        }

        if ($berita->isDirty('judul')) {
            $berita->slug = Str::slug($berita->judul);
        }
    });
}
}
