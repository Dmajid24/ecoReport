<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Laporan extends Model
{
use HasFactory;


protected $fillable = [
'user_id',
'judul',
'deskripsi',
'lokasi',
'foto',
'status', // pending, on_progress, done
];


public function user()
{
return $this->belongsTo(User::class);
}
}