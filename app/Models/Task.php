<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TaskImage;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
    	'title',
    	'description',
    	'user_id',
    	'task_date_time',
    	'is_completed',
       
     ];

     public function image(){
      
      return $this->hasMany(TaskImage::class);

     }
}
