<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = 'devices.';
    const PATH_UPLOAD = 'devices';
    public function index()
    {
        $data = Device::query()->latest('id')->paginate(1);
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'serial' => 'required|string|max:100|unique:devices',
            'img' => 'nullable|max:1000',
            'is_active' =>'required|boolean',
            'describe' => 'nullable|string',
        ]);
        $data = $request->except(['img']);
        if ($request->hasFile('img')) {
            $data['img'] = Storage::put(self::PATH_UPLOAD, $request->file('img'));
            Device::query()->create($data);
            
            return back()->with('msg', 'success');
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Device $device)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Device $device)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('device'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Device $device)
    {
        // $request->validate([
        //     'name' => 'required|string|max:100',
        //     'serial' => 'required|string|max:100|unique:devices,serial,'.$device->serial,
        //     'img' => 'nullable|max:1000',
        //     'is_active' =>'required|boolean',
        //     'describe' => 'nullable|string',
        // ]);
        $data = $request->except(['img']);
        if ($request->hasFile('img')) {
            $data['img'] = Storage::put(self::PATH_UPLOAD, $request->file('img'));
        }
        $oldPathImg = $device->img;
        $device->update($data);
        if ($request->hasFile('img')) {
            Storage::delete($oldPathImg);
        }

        return back()->with('msg', 'thao tac thanh cong');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Device $device)
    {
        $device->delete();
        if (Storage::exists($device->img)) {
            Storage::delete($device->img);
        }
        return back()->with('msg', 'thao tac thanh cong');
    }
}
