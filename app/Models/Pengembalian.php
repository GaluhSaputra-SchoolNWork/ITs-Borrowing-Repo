<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pengembalian
 * 
 * @property int $id_pengembalian
 * @property int|null $id_peminjaman
 * @property Carbon $tanggal_dikembalikan
 * @property string $kondisi_saat_kembali
 * @property string|null $nip_penerima
 * @property Carbon $dibuat_pada
 * @property Carbon $diperbarui_pada
 * 
 * @property Peminjaman|null $peminjaman
 * @property Guru|null $guru
 *
 * @package App\Models
 */
class Pengembalian extends Model
{
	protected $table = 'pengembalian';
	protected $primaryKey = 'id_pengembalian';
	public $timestamps = false;

	protected $casts = [
		'id_peminjaman' => 'int',
		'tanggal_dikembalikan' => 'datetime',
		'dibuat_pada' => 'datetime',
		'diperbarui_pada' => 'datetime'
	];

	protected $fillable = [
		'id_peminjaman',
		'tanggal_dikembalikan',
		'kondisi_saat_kembali',
		'nip_penerima',
		'dibuat_pada',
		'diperbarui_pada'
	];

	public function peminjaman()
	{
		return $this->belongsTo(Peminjaman::class, 'id_peminjaman');
	}

	public function guru()
	{
		return $this->belongsTo(Guru::class, 'nip_penerima');
	}
}
