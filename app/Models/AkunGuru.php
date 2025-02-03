<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AkunGuru
 * 
 * @property string $nip
 * @property string $password
 * 
 * @property Guru $guru
 *
 * @package App\Models
 */
class AkunGuru extends Model
{
	protected $table = 'akun_guru';
	protected $primaryKey = 'nip';
	public $incrementing = false;
	public $timestamps = false;

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'password'
	];

	public function guru()
	{
		return $this->belongsTo(Guru::class, 'nip');
	}
}
