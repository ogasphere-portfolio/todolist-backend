<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   protected $fillable = ['name', 'status'];
   protected $hidden = ['id', 'created_at', 'updated_at'];
}
?>
