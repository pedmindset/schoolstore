<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\SchoolRepository;
use App\Models\School;
use App\Validators\SchoolValidator;

/**
 * Class SchoolRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class SchoolRepositoryEloquent extends BaseRepository implements SchoolRepository
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
        'duration',
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
        return School::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
