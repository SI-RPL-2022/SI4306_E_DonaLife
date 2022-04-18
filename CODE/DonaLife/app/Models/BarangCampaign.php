<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangCampaign extends Model
{
    use HasFactory;
    public $table = "campaign_barang";

    public function inisiator(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function paket(){
        return $this->hasMany(Paket::class,'campaign_id','id');
    }

    public function  getImageAttribute(){
        return asset('storage/' . $this->gambar);
    }
}
