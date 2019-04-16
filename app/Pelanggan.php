<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pelanggan extends Authenticatable
{
	use Notifiable;

	protected $table = 'pelanggan';

	protected $guard = 'pelanggan';

	protected $fillable = ['username', 'password', 'no_kwh', 'nama', 'alamat', 'tarif_id'];

	public function tarif()
	{
		return $this->belongsTo('App\Tarif');
	}

	public function penggunaan()
	{
		return $this->hasMany('App\Penggunaan');
	}

	public function tagihan()
	{
		return $this->hasMany('App\Tagihan');
	}

	public function pembayaran()
	{
		return $this->hasMany('App\Pembayaran');
	}

	public static function boot()
    {
    	parent::boot();

    	static::deleting(function ($pelanggan) {
    		$pelanggan->penggunaan()->delete();
    		$pelanggan->tagihan()->delete();
    		$pelanggan->pembayaran()->delete();
    	});
    }
}
