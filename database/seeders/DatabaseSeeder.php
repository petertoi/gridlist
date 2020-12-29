<?php

namespace Database\Seeders;

use App\Models\GridList;
use App\Models\GridListItem;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        $userA = User::updateOrCreate(
            [
                'email' => 'pete@petertoi.com'
            ],
            [
                'name'     => 'Peter Toi',
                'email'    => 'pete@petertoi.com',
                'password' => Hash::make( 'password' ),
            ]
        );

        $userB = User::updateOrCreate(
            [
                'email' => 'peter@petertoi.com'
            ],
            [
                'name'     => 'Peter Toi',
                'email'    => 'peter@petertoi.com',
                'password' => Hash::make( 'password' ),
            ]
        );

        $foo = GridList::updateOrcreate( [ 'title' => 'Foo' ],
            [
                'user_id' => $userA->id,
                'title'   => 'Foo',
                'cols'    => 2,
            ] );

        $fooA = GridListItem::updateOrCreate( [ 'grid_list_id' => $foo->id, 'title' => 'A' ], [
            'grid_list_id' => $foo->id,
            'title'        => 'A',
            'meta' => ['color' => '#F56565'],

        ] );
        $fooB = GridListItem::updateOrCreate( [ 'grid_list_id' => $foo->id, 'title' => 'B' ], [
            'grid_list_id' => $foo->id,
            'title'        => 'B',
            'meta' => ['color' => '#ED8936'],
        ] );

        $foo->save();

        $bar = GridList::updateOrCreate( [ 'title' => 'Bar' ], [
            'user_id' => $userB->id,
            'title'   => 'Bar',
            'cols'    => 3,
        ] );

        $barA = GridListItem::updateOrCreate( [ 'grid_list_id' => $bar->id, 'title' => 'A' ], [
            'grid_list_id' => $bar->id,
            'title'        => 'A',
            'meta' => ['color' => '#F56565'],
        ] );
        $barB = GridListItem::updateOrCreate( [ 'grid_list_id' => $bar->id, 'title' => 'B' ], [
            'grid_list_id' => $bar->id,
            'title'        => 'B',
            'meta' => ['color' => '#ECC94B'],
        ] );
        $barC = GridListItem::updateOrCreate( [ 'grid_list_id' => $bar->id, 'title' => 'C' ], [
            'grid_list_id' => $bar->id,
            'title'        => 'C',
            'meta' => ['color' => '#4299E1'],
        ] );

        $bar->save();

    }
}
