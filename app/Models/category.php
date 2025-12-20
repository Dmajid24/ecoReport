<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    // Relasi: 1 kategori punya banyak report
    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
