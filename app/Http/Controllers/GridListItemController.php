<?php

namespace App\Http\Controllers;

use App\Models\GridList;
use App\Models\GridListItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class GridListItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Models\GridList $gridList
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GridList $gridList)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\GridList $gridList
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, GridList $list)
    {
        $validated = $request->validateWithBag(
            'gridListItemModal',
            [
                'title' => 'required|max:256',
                'meta' => 'array',
                'meta.color' => 'string',
            ]
        );

        $list->items()->create($validated);

        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\GridList $gridList
     * @param \App\Models\GridListItem $gridListItem
     *
     * @return \Illuminate\Http\Response
     */
    public function show(GridList $gridList, GridListItem $gridListItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\GridList $gridList
     * @param \App\Models\GridListItem $gridListItem
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, GridList $list, GridListItem $item)
    {
        $validated = $request->validateWithBag(
            'gridListItemModal',
            [
                'title' => 'required|max:256',
                'meta' => 'array',
                'meta.color' => 'string',
            ]
        );

        $item->update($validated);

        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\GridList $gridList
     * @param \App\Models\GridListItem $gridListItem
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(GridList $gridList, GridListItem $gridListItem)
    {
        //
    }
}
