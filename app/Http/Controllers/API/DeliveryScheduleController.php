<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\DeliveryScheduleResource;
use App\Models\DeliverySchedule;
use Illuminate\Http\Request;

class DeliveryScheduleController extends Controller
{
    protected $model = DeliverySchedule::class;
    protected $modelResource = DeliveryScheduleResource::class;

    public function index()
    {
        $data = $this->model::filterByDriver()->paged();
        return $this->modelResource::collection($data);
    }
}
