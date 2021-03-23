<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $model = Product::class;
    protected $modelResource = ProductResource::class;

    public function index()
    {
        $data = $this->model::filterByCategory()->paged();
        return $this->modelResource::collection($data);
    }
}
