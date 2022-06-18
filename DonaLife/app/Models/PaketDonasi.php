<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketDonasi extends Model
{
    use HasFactory;
    public $table = "paket_donasi";
    
    public function donatur(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    
    // public function paket(){

    // }

    public function campaign(){
        return $this->belongsTo(BarangCampaign::class,'campaign_barang_id','id');
    }
    
    public function  getImageAttribute(){
        return asset('storage/' . $this->photo_paket);
    }
}
