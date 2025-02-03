<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Murid
 * 
 * @property string $nisn
 * @property string $nama
 * @property string $email
 * @property string|null $nomor_ponsel_murid
 * @property string|null $alamat
 * @property string|null $status_akun
 * @property Carbon $dibuat_pada
 * @property Carbon $diperbarui_pada
 * 
 * @property AkunMurid $akun_murid
 * @property Collection|Peminjaman[] $peminjamen
 *
 * @package App\Models
 */
class Murid extends Model
{
	protected $table = 'murid';
	protected $primaryKey = 'nisn';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'dibuat_pada' => 'datetime',
		'diperbarui_pada' => 'datetime'
	];

	protected $fillable = [
		'nama',
		'email',
		'nomor_ponsel_murid',
		'alamat',
		'status_akun',
		'dibuat_pada',
		'diperbarui_pada'
	];

	public function akun_murid()
	{
		return $this->hasOne(AkunMurid::class, 'nisn');
	}

	public function peminjamen()
	{
		return $this->hasMany(Peminjaman::class, 'nisn');
	}
}
