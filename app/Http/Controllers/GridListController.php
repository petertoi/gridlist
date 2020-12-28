<?php

namespace App\Http\Controllers;

use App\Models\GridList;
use App\Models\GridListItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class GridListController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response|\Inertia\Response
     */
    public function index() {
        return Inertia::render( 'GridList/Index', [
            'lists' => GridList::where( [ 'user_id' => Auth::id() ] )->get(),
        ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response|\Inertia\Response
     */
    public function create() {
        return Inertia::render( 'GridList/Create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Inertia\Response
     */
    public function store( Request $request ) {
        $validated = $request->validate( [
            'title' => 'required|max:255',
        ] );

        $validated['user_id'] = Auth::id();
        $validated['cols']    = 1;

        $list = GridList::create( $validated );

        return Redirect::route( 'l.edit', [
            'list' => $list->load( 'items' ),
        ] );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GridList  $gridList
     *
     * @return \Illuminate\Http\Response|\Inertia\Response
     */
    public function show( GridList $list ) {
        return Inertia::render( 'GridList/Show', [
            'list' => $list->load( 'items' ),
        ] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GridList  $gridList
     *
     * @return \Illuminate\Http\Response|\Inertia\Response
     */
    public function edit( GridList $list ) {
        return Inertia::render( 'GridList/Edit', [
            'list' => $list->load( 'items' ),
        ] );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GridList  $gridList
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update( Request $request, GridList $list ) {

        $validated = $request->validate( [
            'title'         => 'required|max:255',
            'cols'          => 'required|int',
            'items'         => 'array',
            'items.*.title' => 'required|max:255',
        ] );

        $list->title = $validated['title'];
        $list->cols = $validated['cols'];
        $list->save();

        $previousUuids = $list->items()->pluck( 'uuid' )->toArray();

        $new = array_filter(
            $validated['items'],
            function ( $item ) {
                return ! array_key_exists( 'uuid', $item );
            } );

        $keep = array_filter(
            $validated['items'],
            function ( $item ) {
                return array_key_exists( 'uuid', $item );
            } );

        if ( $keep ) {
            foreach ( $keep as $item ) {
                $list->items()->updateOrCreate(
                    [ 'uuid' => $item['uuid'] ],
                    $item
                );
            }
        }

        if ( $new ) {
            foreach ( $new as $item ) {
                $list->items()->create(
                    $item
                );
            }
        }

        return Redirect::route( 'l.show', [
            'list' => $list->load( 'items' ),
        ] );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GridList  $gridList
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy( GridList $list ) {
        //
    }
}
