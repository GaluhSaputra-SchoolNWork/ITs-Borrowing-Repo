<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Peminjaman
 * 
 * @property int $id_peminjaman
 * @property string|null $nisn
 * @property int|null $id_barang
 * @property int $jumlah_dipinjam
 * @property Carbon $tanggal_pinjam
 * @property Carbon $tanggal_harus_kembali
 * @property string|null $status
 * @property string $kondisi_saat_dipinjam
 * @property string|null $nip_peminjam
 * @property Carbon $dibuat_pada
 * @property Carbon $diperbarui_pada
 * 
 * @property Murid|null $murid
 * @property Barang|null $barang
 * @property Guru|null $guru
 * @property Collection|Pengembalian[] $pengembalians
 *
 * @package App\Models
 */
class Peminjaman extends Model
{
	protected $table = 'peminjaman';
	protected $primaryKey = 'id_peminjaman';
	public $timestamps = false;

	protected $casts = [
		'id_barang' => 'int',
		'jumlah_dipinjam' => 'int',
		'tanggal_pinjam' => 'datetime',
		'tanggal_harus_kembali' => 'datetime',
		'dibuat_pada' => 'datetime',
		'diperbarui_pada' => 'datetime'
	];

	protected $fillable = [
		'nisn',
		'id_barang',
		'jumlah_dipinjam',
		'tanggal_pinjam',
		'tanggal_harus_kembali',
		'status',
		'kondisi_saat_dipinjam',
		'nip_peminjam',
		'dibuat_pada',
		'diperbarui_pada'
	];

	public function murid()
	{
		return $this->belongsTo(Murid::class, 'nisn');
	}

	public function barang()
	{
		return $this->belongsTo(Barang::class, 'id_barang');
	}

	public function guru()
	{
		return $this->belongsTo(Guru::class, 'nip_peminjam');
	}

	public function pengembalians()
	{
		return $this->hasMany(Pengembalian::class, 'id_peminjaman');
	}
}
