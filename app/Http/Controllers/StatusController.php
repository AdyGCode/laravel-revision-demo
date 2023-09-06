<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Http\Requests\StoreStatusRequest;
use App\Http\Requests\UpdateStatusRequest;
use Illuminate\View\View;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $statuses = Status::paginate(3); // 3 = 3 items per page
        return view('statuses.index', compact(['statuses',]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('statuses.create')->with('messages');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStatusRequest $request)
    {
        $newData = $request->validated();
        $status = Status::create($newData);
        return redirect(route('statuses.index'))
            ->with('messages', ["New Status ($status->name) added"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Status $status): View
    {
        return view('statuses.show', compact(['status',]));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Status $status)
    {
        return view('statuses.update', compact(['status',]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStatusRequest $request, Status $status)
    {
        $validated = $request->validated();
        $status->update($validated);
        return redirect(route('statuses.index'))
            ->with('messages', ["Updated Status ($status->name)"]);
    }

    /**
     * Verify user wishes to delete the status resource
     */
    public function delete(Status $status)
    {
        return view('statuses.delete', compact(['status']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Status $status)
    {
        $oldStatus = $status;
        $status->delete();
        return redirect(route('statuses.index'))
            ->with('messages', ["Deleted Status ($oldStatus->name)"]);
    }
}
