<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CollectionRepository;
use App\Models\Collection;
use App\Validators\CollectionValidator;

/**
 * Class CollectionRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CollectionRepositoryEloquent extends BaseRepository implements CollectionRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Collection::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
