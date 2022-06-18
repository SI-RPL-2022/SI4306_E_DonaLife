<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    public $table = "berita";

    
    public function campaignBarangId(){
        return $this->belongsTo(BarangCampaign::class,'campaign_barang_id','id');
    }

    public function campaignUangId(){
        return $this->belongsTo(UangCampaign::class,'campaign_uang_id','id');
    }

    public function getImageAttribute(){
        return asset('storage/' . $this->foto);
    }
}
