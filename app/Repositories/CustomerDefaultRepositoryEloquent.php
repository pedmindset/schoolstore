<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CustomerDefaultRepository;
use App\Models\CustomerDefault;
use App\Validators\CustomerDefaultValidator;

/**
 * Class CustomerDefaultRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CustomerDefaultRepositoryEloquent extends BaseRepository implements CustomerDefaultRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CustomerDefault::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
