<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Guru
 * 
 * @property string $nip
 * @property string $nama_guru
 * @property string $email_guru
 * @property string|null $nomor_ponsel_guru
 * @property Carbon $dibuat_pada
 * @property Carbon $diperbarui_pada
 * 
 * @property AkunGuru $akun_guru
 * @property Collection|Peminjaman[] $peminjamen
 * @property Collection|Pengembalian[] $pengembalians
 *
 * @package App\Models
 */
class Guru extends Model
{
	protected $table = 'guru';
	protected $primaryKey = 'nip';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'dibuat_pada' => 'datetime',
		'diperbarui_pada' => 'datetime'
	];

	protected $fillable = [
		'nama_guru',
		'email_guru',
		'nomor_ponsel_guru',
		'dibuat_pada',
		'diperbarui_pada'
	];

	public function akun_guru()
	{
		return $this->hasOne(AkunGuru::class, 'nip');
	}

	public function peminjamen()
	{
		return $this->hasMany(Peminjaman::class, 'nip_peminjam');
	}

	public function pengembalians()
	{
		return $this->hasMany(Pengembalian::class, 'nip_penerima');
	}
}
