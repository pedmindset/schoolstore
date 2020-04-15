<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\AccountRepository;
use App\Models\Account;

/**
 * Class AccountRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class AccountRepositoryEloquent extends BaseRepository implements AccountRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'customer.name' => 'like',
        'default_count' => '<=',
        'default_amount' => '<=',
        'credit' => '<=',
        'limit' => '<=',
        
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Account::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
