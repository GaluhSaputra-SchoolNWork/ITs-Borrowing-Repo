<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AkunMurid
 * 
 * @property string $nisn
 * @property string $password
 * 
 * @property Murid $murid
 *
 * @package App\Models
 */
class AkunMurid extends Model
{
	protected $table = 'akun_murid';
	protected $primaryKey = 'nisn';
	public $incrementing = false;
	public $timestamps = false;

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'password'
	];

	public function murid()
	{
		return $this->belongsTo(Murid::class, 'nisn');
	}
}
