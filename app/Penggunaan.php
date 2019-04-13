<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penggunaan extends Model
{
    protected $table = 'penggunaan';

	protected $fillable = ['pelanggan_id', 'bulan', 'tahun', 'meter_awal', 'meter_akhir'];

	public function pelanggan()
	{
		return $this->belongsTo('App\Pelanggan');
	}

	public function tagihan()
	{
		return $this->hasOne('App\Tagihan');
	}	

}
