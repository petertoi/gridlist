<?php

namespace App\Http\Controllers;

use App\Models\GridList;
use App\Models\GridListItem;
use Illuminate\Http\Request;
use Inertia\Inertia;

class GridListItemController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\GridList  $gridList
     *
     * @return \Illuminate\Http\Response
     */
    public function index( GridList $gridList ) {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GridList  $gridList
     *
     * @return \Illuminate\Http\Response|\Inertia\Response
     */
    public function store( Request $request, GridList $list ) {
        $validated = $request->validate( [
            'title' => 'required|max:255',
        ] );

        $list->items()->create( [
            'title' => $validated['title']
        ] );

        return Inertia::render( 'GridList/Show', [
            'list' => $list->load( 'items' ),
        ] );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GridList  $gridList
     * @param  \App\Models\GridListItem  $gridListItem
     *
     * @return \Illuminate\Http\Response
     */
    public function show( GridList $gridList, GridListItem $gridListItem ) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GridList  $gridList
     * @param  \App\Models\GridListItem  $gridListItem
     *
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, GridList $gridList, GridListItem $gridListItem ) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GridList  $gridList
     * @param  \App\Models\GridListItem  $gridListItem
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy( GridList $gridList, GridListItem $gridListItem ) {
        //
    }
}
