<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Setting
 * @package App\Models
 * @version August 8, 2018, 3:33 pm UTC
 *
 * @property string|\Carbon\Carbon nomination_start_date
 * @property string|\Carbon\Carbon nomination_end_date
 * @property string|\Carbon\Carbon voting_start_date
 * @property string|\Carbon\Carbon voting_end_date
 */
class Setting extends Model
{
    use SoftDeletes;

    public $table = 'settings';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = [
        'deleted_at',
        'nomination_start_date',
        'nomination_end_date',
        'voting_start_date',
        'voting_end_date'
    ];


    public $fillable = [
        'nomination_start_date',
        'nomination_end_date',
        'voting_start_date',
        'voting_end_date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nomination_start_date' => 'required|date',
        'nomination_end_date' => 'required|date|after:nomination_start_date',
        'voting_start_date' => 'required|date|after:nomination_end_date',
        'voting_end_date' => 'required|date|after:voting_start_date'
    ];

        /**
     * Validation messages
     *
     * @var array
     */
    public static $messages = [
        'nomination_start_date.required' => 'Input Nomination start date.',
        'nomination_start_date.date' => 'Input Nomination start date.',
        'nomination_end_date.required' => 'Input Nomination end date.',
        'nomination_end_date.date' => 'Input Nomination end date.',
        'nomination_end_date.after' => 'Nomination end date must be later than Nomination start date.',
        'voting_start_date.required' => 'Input Voting start date.',
        'voting_start_date.date' => 'Input Voting start date.',
        'voting_start_date.after' => 'Voting start date must be later than Nomination end date.',
        'voting_end_date.required' => 'Input Voting end date.',
        'voting_end_date.date' => 'Input Voting end date.',
        'voting_end_date.after' => 'Voting end date must be later than Voting start date.'
    ];
}
