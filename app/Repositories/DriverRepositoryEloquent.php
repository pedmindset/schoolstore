<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\DriverRepository;
use App\Models\Driver;
use App\Validators\DriverValidator;

/**
 * Class DriverRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class DriverRepositoryEloquent extends BaseRepository implements DriverRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Driver::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
