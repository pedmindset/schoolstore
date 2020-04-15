<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ReceiptRepository;
use App\Models\Receipt;
use App\Validators\ReceiptValidator;

/**
 * Class ReceiptRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ReceiptRepositoryEloquent extends BaseRepository implements ReceiptRepository
{
     /**
     * @var array
     */
    protected $fieldSearchable = [
        'transaction_id',
        'code' => 'like'
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Receipt::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
