<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\DeliveryScheduleOrderResource;
use App\Http\Resources\DeliveryScheduleResource;
use App\Models\DeliverySchedule;
use App\Models\DeliveryScheduleOrder;
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

    public function confirm(Request $request)
    {
        $data = DeliveryScheduleOrder::find($request->schedule_order_id);
        $data->confirmDelivery();
        return $this->apiSuccess("Appointment status changed successfully!", 200, new DeliveryScheduleOrderResource($data));
    }
}