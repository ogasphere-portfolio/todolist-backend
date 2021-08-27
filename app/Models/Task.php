<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
   protected $fillable = ['id','title','completion','status','category_id'];
   protected $hidden = ['created_at', 'updated_at'];

   public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
?>
