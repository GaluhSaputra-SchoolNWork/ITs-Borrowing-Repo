<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Barang
 * 
 * @property int $id_barang
 * @property string $nama_barang
 * @property int $stok_total
 * @property int $stok_tersedia
 * @property string $kategori
 * @property string|null $status_barang
 * @property string $deskripsi
 * @property Carbon $dibuat_pada
 * @property Carbon $diperbarui_pada
 * 
 * @property Collection|Peminjaman[] $peminjamen
 *
 * @package App\Models
 */
class Barang extends Model
{
	protected $table = 'barang';
	protected $primaryKey = 'id_barang';
	public $timestamps = false;

	protected $casts = [
		'stok_total' => 'int',
		'stok_tersedia' => 'int',
		'dibuat_pada' => 'datetime',
		'diperbarui_pada' => 'datetime'
	];

	protected $fillable = [
		'nama_barang',
		'stok_total',
		'stok_tersedia',
		'kategori',
		'status_barang',
		'deskripsi',
		'dibuat_pada',
		'diperbarui_pada'
	];

	public function peminjamen()
	{
		return $this->hasMany(Peminjaman::class, 'id_barang');
	}
}
