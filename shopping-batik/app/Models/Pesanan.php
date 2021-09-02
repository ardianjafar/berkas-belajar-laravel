<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Pesanan extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','tanggal','status','jumlah_harga'];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function pesanan_detail()
    {
        return $this->hasMany(PesananDetail::class,'pesanan_id','id');
    }

    public function notif()
    {
        $pesanan_utama = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $notif = PesananDetail::where('pesanan_id', $pesanan_utama->id)->count();
        return view('layouts.app', compact('notif'));
    }

}
