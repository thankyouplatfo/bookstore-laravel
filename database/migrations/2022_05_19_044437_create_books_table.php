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
            $table->foreignId('category_id')->nullable()->references('id')->on('categories')->cascadeOnDelete('cascade');
            $table->foreignId('publisher_id')->nullable()->references('id')->on('publishers')->cascadeOnDelete('cascade');
            $table->string('title');
            $table->string('isbn')->nullable();
            $table->text('desc')->nullable();
            $table->string('publish_year')->nullable();
            $table->string('number_of_pages')->nullable();
            $table->string('number_of_copies')->nullable();
            $table->boolean('bought')->default(FALSE);
            $table->decimal('price',8,2);
            $table->string('cover_image');
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
