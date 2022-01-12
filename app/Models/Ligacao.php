<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ligacao extends Model
{
    use HasFactory;
    protected $table = 'ligacao';
    public $timestamps = false;
}
