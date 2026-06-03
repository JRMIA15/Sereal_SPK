<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sereal extends Model
{
    use HasFactory;

    protected $table = 'sereal';

    protected $fillable = [
        'name',
    ];

    public function kriterias()
    {
        return $this->belongsToMany(Kriteria::class, 'kriteria_sereal', 'sereal_id', 'kriteria_id')
            ->withPivot('value')
            ->withTimestamps();
    }
}
