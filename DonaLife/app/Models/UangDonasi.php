<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UangDonasi extends Model
{
    use HasFactory;
    public $table = "uang_donasi";
    
    public function donatur(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    
    public function campaign(){
        return $this->belongsTo(UangCampaign::class,'campaign_uang_id','id');
    }
    
    public function  getImageAttribute(){
        return asset('storage/' . $this->photo);
    }
}
