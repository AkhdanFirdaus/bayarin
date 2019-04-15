<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';

	protected $fillable = ['tagihan_id', 'pelanggan_id', 'tanggal_pembayaran', 'bulan_bayar', 'biaya_admin', 'total_bayar', 'admin_id', 'metode', 'kode'];

	public function tagihan()
	{
		return $this->belongsTo('App\Tagihan');
	}

	public function pelanggan()
	{
		return $this->belongsTo('App\Pelanggan');
	}

	public function admin()
	{
		return $this->belongsTo('App\User', 'admin_id');
	}
}
