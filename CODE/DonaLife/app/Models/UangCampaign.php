<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UangCampaign extends Model
{
    use HasFactory;
    public $table = "campaign_uang";
    
    public function inisiator(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    
    public function  getImageAttribute(){
        return asset('storage/' . $this->gambar);
    }

    public function donasi(){
        return $this->belongsTo(UangDonasi::class,'id','campaign_uang_id');
    }
}
