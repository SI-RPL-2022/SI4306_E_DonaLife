<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;
    public $table = "paket";

    public function campaign(){
        return $this->belongsTo(BarangCampaign::class,'campaign_id','id');
    }

    public function  getImageAttribute(){
        return asset('storage/' . $this->paket_foto);
    }
}
