<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    protected $table = 'tagihan';

	protected $fillable = ['penggunaan_id', 'pelanggan_id', 'bulan', 'tahun', 'jumlah_meter', 'status'];

	public function penggunaan()
	{
		return $this->belongsTo('App\Penggunaan');
	}

	public function pelanggan()
	{
		return $this->belongsTo('App\Pelanggan');
	}
}
