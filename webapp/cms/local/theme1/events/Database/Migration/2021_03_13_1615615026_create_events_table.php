<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 500);
            $table->string('short_content', 5000);
            $table->date('event_date');
            $table->date('event_end_date');
            $table->string('location', 500);
            $table->string('source', 500);
            $table->string('url', 1000);
            $table->string('day_count');
            $table->integer('is_bot')->default(0);
            $table->integer('status')->default(1);
            $table->integer('created_by')->unsigned();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
