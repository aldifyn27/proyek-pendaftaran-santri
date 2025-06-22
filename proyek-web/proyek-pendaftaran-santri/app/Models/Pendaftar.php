<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    use HasFactory;

    /**
     * Menentukan nama tabel yang digunakan oleh model ini.
     *
     * @var string
     */
    protected $table = 'pendaftar'; // <-- TAMBAHKAN BARIS INI

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}