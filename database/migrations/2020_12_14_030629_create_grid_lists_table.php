<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGridListsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create( 'grid_lists', function ( Blueprint $table ) {
            $table->id();
            $table->uuid( 'uuid' );
            $table->foreignIdFor( \App\Models\User::class )->constrained();
            $table->string( 'title' );
            $table->integer( 'cols' )->default(1);
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists( 'grid_lists' );
    }
}
