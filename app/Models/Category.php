<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   protected $fillable = ['id','name', 'status'];
   //protected $visible = ['name'];
   protected $hidden = ['created_at', 'updated_at'];

   

    public function task()
    {
        return $this->hasMany(Task::class);
    }
}
?>
