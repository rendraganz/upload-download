<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileUp extends Model
{
    protected $table = 'file_up'; // nama tabel manual
    protected $fillable = ['filename', 'path'];
}
