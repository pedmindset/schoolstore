<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\BillingInformationRepository;
use App\Models\BillingInformation;
use App\Validators\BillingInformationValidator;

/**
 * Class BillingInformationRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class BillingInformationRepositoryEloquent extends BaseRepository implements BillingInformationRepository
{
     /**
     * @var array
     */
    protected $fieldSearchable = [
        'momo_number' => 'like',
        'payment_method',
        'email',
        'phone' => 'like',
        'phone2' => 'like',
        'address' => 'like',
        'address2' => 'like',
        'city',
        'region',
        'country',
        'customer.name' => 'like', 
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return BillingInformation::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
