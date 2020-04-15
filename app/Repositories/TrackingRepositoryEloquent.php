<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\TrackingRepository;
use App\Models\Tracking;
use App\Validators\TrackingValidator;

/**
 * Class TrackingRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class TrackingRepositoryEloquent extends BaseRepository implements TrackingRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Tracking::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
