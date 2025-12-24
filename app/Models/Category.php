<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeCoverage\Report\Xml\Report;

class Category extends Model
{
    protected $fillable = [
        'name',
    ];

    // Relasi: 1 kategori punya banyak report
    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
