<?php

namespace App;
use User;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $table = 'posts';
    public $fillable = ['name','user_id'];

   public function users(){
        return $this->belongsTo(User::class,'user_id');
    }
}
