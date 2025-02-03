<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AkunAdmin
 * 
 * @property string $username
 * @property string $password
 *
 * @package App\Models
 */
class AkunAdmin extends Model
{
	protected $table = 'akun_admin';
	protected $primaryKey = 'username';
	public $incrementing = false;
	public $timestamps = false;

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'password'
	];
}
