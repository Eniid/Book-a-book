<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->string('edition');
            $table->string('isbn');
            $table->unsignedSmallInteger('stock');
            $table->string('teacher');
            $table->string('class');
            $table->string('link');
            $table->string('school_price');
            $table->string('store_price');
            $table->boolean('required')->default(false);
            $table->foreignId('bloc_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
