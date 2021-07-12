<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\AccountResource;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    protected $model = Account::class;
    protected $modelResource = AccountResource::class;

    public function index()
    {
        $data = $this->model::owned()->first();
        return $this->modelResource::collection($data);
    }
}
