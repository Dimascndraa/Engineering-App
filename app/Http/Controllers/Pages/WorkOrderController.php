<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\WorkOrder;
use Illuminate\Http\Request;

class WorkOrderController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', 1)->get();

        return view('pages.work-order.index', [
            'title' => 'Work Order',
            'workOrders' => WorkOrder::all(),
            'categories' => $categories
        ]);
    }
}
