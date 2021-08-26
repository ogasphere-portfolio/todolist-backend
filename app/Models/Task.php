<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
   protected $fillable = ['title','completion','status','idcategory'];
   protected $hidden = ['id', 'created_at', 'updated_at'];
}
?>
