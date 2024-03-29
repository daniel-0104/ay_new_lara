<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class helmet extends Model
{
    use HasFactory;

    protected $fillable = ['name','type','price','color','image','description','material','view_count'];
}
