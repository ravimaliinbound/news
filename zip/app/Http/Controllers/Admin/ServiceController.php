<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Unit;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * [list description]
     *
     * @return [type] [description]
     */
    public function list()
    {
        $service = Service::where('is_delete', 0)->get();

        return view('admin.service.list', compact('service'));
    }

    /**
     * [create description]
     *
     * @return [type] [description]
     */
    public function create()
    {
        $units = Unit::all();

        return view('admin.service.add', compact('units'));
    }

    /**
     * [store description]
     *
     * @param  Request  $request  [description]
     *
     * @return [type]           [description]
     */
    public function store(Request $request)
    {
        // dd($_REQUEST);

        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'units' => 'required',
        ]);

        // Concatenate selected units into a comma-separated string
        $applicableUnits = implode(',', $request->units);

        // Create a new service instance
        $service = new Service();
        $service->name = $request->name;
        $service->applicable_unit = $applicableUnits;
        $service->save();

        $service->units()->attach($request->units);

        // Redirect back with a success message
        return redirect(route('admin.service.list'))->with('messages', [
            [
                'type' => 'success',
                'title' => 'Service',
                'message' => 'Service successfully added',
            ],
        ]);
    }

    /**
     * [edit description]
     *
     * @param  [type] $id [description]
     *
     * @return [type]     [description]
     */
    public function edit($id)
    {
        $service = Service::where('id', base64_decode($id))->first();
        $units = Unit::all();

        return view('admin.service.edit', compact('service', 'units'));
    }

    /**
     * [update description]
     *
     * @param  Request  $request  [description]
     *
     * @return [type]           [description]
     */
    public function update(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'units' => 'required',
        ]);

        $service = Service::findOrFail($request->id);
        $service->name = $request->name;

        $service->save();
        // Update units for the service
        \Log::info('Sync Units:', $request->units);
        $service->units()->sync($request->units);

        // Save the service
        $unitNames = Unit::whereIn('id', $request->units)->pluck('name')->implode(',');
        $service->applicable_unit = $unitNames;
        $service->save();

        // Debug: Inspect the updated service
        \Log::info('Updated Service:', $service->toArray());

        // Redirect back with a success message
        return redirect(route('admin.service.list'))->with('messages', [
            [
                'type' => 'success',
                'title' => 'Service',
                'message' => 'Service successfully updated',
            ],
        ]);
    }

    /**
     * [delete description]
     *
     * @param  [type] $id [description]
     *
     * @return [type]     [description]
     */
    public function delete($id)
    {
        $delete = Service::where('id', base64_decode($id))->update(['is_delete' => 1]);

        return redirect(route('admin.service.list'))->with('messages', [
            [
                'type' => 'success',
                'title' => 'Service ',
                'message' => 'Service successfully deleted',
            ],
        ]);
    }

    /**
     * [checkServiceName description]
     *
     * @param  Request  $request  [description]
     *
     * @return [type]           [description]
     */
    public function checkServiceName(Request $request)
    {
        $query = Service::where('name', $request->name);
        if (isset($request->id) && $request->id !== '') {
            $query->where('id', '!=', $request->id);
        }
        $service = $query->first();

        return ! is_null($service) ? 'false' : 'true';
    }
}
