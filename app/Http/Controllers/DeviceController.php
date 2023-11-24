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
        $data = Device::query()->paginate(1);
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
            'img' => 'nullable|string|max:255',
            'is_active' => 'boolean',
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
        $device->update($request->all());
        return back()->with('msg', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Device $device)
    {
        $device->delete();
        return back()->with('msg', ' delete success');
    }
}
