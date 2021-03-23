<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCategoryResource;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    protected $model = ProductCategory::class;
    protected $modelResource = ProductCategoryResource::class;

    public function index()
    {
        $data = $this->model::paged();
        return $this->modelResource::collection($data);
    }
}
