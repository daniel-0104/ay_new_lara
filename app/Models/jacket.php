<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jacket extends Model
{
    use HasFactory;

    protected $fillable = ['name','price','image','color','type','size','description','view_count'];
}
