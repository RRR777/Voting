<?php

namespace App\Repositories;

use App\Models\Nomination;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class NominationRepository
 * @package App\Repositories
 * @version August 8, 2018, 3:28 pm UTC
 *
 * @method Nomination findWithoutFail($id, $columns = ['*'])
 * @method Nomination find($id, $columns = ['*'])
 * @method Nomination first($columns = ['*'])
*/
class NominationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'gender',
        'linkedin_url',
        'bio',
        'business_name',
        'image',
        'reason_for_nomination',
        'no_of_nominations',
        'is_admin_selected',
        'is_won',
        'user_id',
        'category_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Nomination::class;
    }
}
