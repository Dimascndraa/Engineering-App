<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\WorkOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WorkOrderApiController extends Controller
{
    public function generateLaporanCode()
    {
        // Logika untuk menghasilkan kode laporan, contoh menggunakan increment
        $nextCode = sprintf('WO%05d', WorkOrder::max('id') + 1);

        return response()->json(['laporanCode' => $nextCode]);
    }

    public function getWorkOrder()
    {
        $workOrder = WorkOrder::all();

        return response()->json($workOrder);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'category_id' => 'required',
            'title' => 'required|max:255',
            'code' => 'required|unique:work_orders',
            'type' => 'required',
            'description' => 'required',
            'photo' => 'image|file|max:5120',
        ]);

        if ($request->file('photo')) {
            $validatedData['photo'] = $request->file('photo')->store('img-laporan');
        }


        $workOrder = WorkOrder::create($validatedData);

        return response()->json(['message' => 'Laporan berhasil ditambahkan', 'workOrder' => $workOrder]);
    }

    public function show($workOrderId)
    {
        $workOrder = WorkOrder::findOrFail($workOrderId);
        return response()->json($workOrder);
    }

    public function update(Request $request, $workOrderId)
    {
        $workOrder = WorkOrder::findOrFail($workOrderId);
        $rules = [
            'user_id' => 'required',
            'category_id' => 'required',
            'title' => 'required|max:255',
            'code' => 'required|unique:work_orders,code,' . $workOrder->id,
            'type' => 'required',
            'description' => 'required',
            'photo' => 'image|file|max:5120',
        ];


        $validatedData = $request->validate($rules);

        if ($request->file('photo')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $validatedData['photo'] = $request->file('photo')->store('img-laporan');
        }


        $workOrder->update($validatedData);

        return response()->json(['message' => 'Laporan updated successfully']);
    }
}
