<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    protected $table = 'kriteria';

    protected $fillable = [
        'code',
        'name',
        'type',
        'weight',
    ];

    public function sereals()
    {
        return $this->belongsToMany(Sereal::class, 'kriteria_sereal', 'kriteria_id', 'sereal_id')
            ->withPivot('value')
            ->withTimestamps();
    }
}
