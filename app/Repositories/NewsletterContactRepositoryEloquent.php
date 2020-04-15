<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\NewsletterContactRepository;
use App\Models\NewsletterContact;
use App\Validators\NewsletterContactValidator;

/**
 * Class NewsletterContactRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class NewsletterContactRepositoryEloquent extends BaseRepository implements NewsletterContactRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return NewsletterContact::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
