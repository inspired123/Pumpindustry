<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsFromResource extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_from_resource', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('short_content',500)->nullable();
            $table->string('url',999);
            $table->string('image', 999);
            $table->string('source');
            $table->integer('status');
            // $table->integer('created_by')->unsigned();
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
        Schema::dropIfExists('news_from_resource');
    }
}
