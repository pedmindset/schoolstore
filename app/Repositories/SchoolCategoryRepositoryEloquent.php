<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\SchoolCategoryRepository;
use App\Models\SchoolCategory;
use App\Validators\SchoolCategoryValidator;

/**
 * Class SchoolCategoryRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class SchoolCategoryRepositoryEloquent extends BaseRepository implements SchoolCategoryRepository
{
    /**
    * @var array
    */
    protected $fieldSearchable = [
        'name' => 'like',
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return SchoolCategory::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
