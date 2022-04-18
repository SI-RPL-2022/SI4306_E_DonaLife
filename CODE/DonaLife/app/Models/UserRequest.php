<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRequest extends Model
{
    use HasFactory;
    public $table = "request";
    
    public function inisiator(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function  getImageAttribute(){
        return asset('storage/' . $this->gambar);
    }
}
