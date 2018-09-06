<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class User
 * @package App\Models
 * @version August 8, 2018, 3:33 pm UTC
 *
 * @property string name
 * @property string email
 * @property string password
 * @property string avatar
 * @property string facebook_url
 * @property string nickname
 * @property integer role_id
 * @property string remember_token
 */
class User extends Model
{
    use SoftDeletes;

    public $table = 'users';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'facebook_url',
        'nickname',
        'role_id',
        'remember_token',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'password' => 'string',
        'avatar' => 'string',
        'facebook_url' => 'string',
        'nickname' => 'string',
        'role_id' => 'integer',
        'remember_token' => 'string',
    ];

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

        /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        //
    ];

        /**
     * Validation messages
     *
     * @var array
     */
    public static $messages = [
        //
    ];
}
