<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Report extends Model
{
    use HasFactory;


protected $fillable = [
'user_id',
'title',
'description',
'location',
'photo_before',
'status', // pending, on_progress, done
'category_id',
];

public function user()
{
    return $this->belongsTo(User::class);
}

public function category()
{
    return $this->belongsTo(Category::class);
}
}
