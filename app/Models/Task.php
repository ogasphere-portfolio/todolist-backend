<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
   protected $fillable = ['title','completion','status','category_id'];
   protected $hidden = ['id', 'created_at', 'updated_at'];

   public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
?>
