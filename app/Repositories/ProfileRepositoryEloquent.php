<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ProfileRepository;
use App\Models\Profile;

/**
 * Class ProfileRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ProfileRepositoryEloquent extends BaseRepository implements ProfileRepository
{

     /**
     * @var array
     */
    protected $fieldSearchable = [
        'name' => 'like',
        'email',
        'phone' => 'like',
        'phone2' => 'like',
        'address' => 'like',
        'address2' => 'like',
        'city',
        'region',
        'country',
    ];

    
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Profile::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
