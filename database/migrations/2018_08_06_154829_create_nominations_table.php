<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNominationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nominations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('gender');
            $table->string('linkedin_url')->nullable();
            $table->string('bio')->nullable();
            $table->string('business_name')->nullable();
            $table->string('image')->nullable();
            $table->string('reason_for_nomination')->nullable();
            $table->integer('no_of_nominations');
            $table->integer('no_of_votes')->default(0);
            $table->boolean("is_admin_selected")->default(0);
            $table->boolean("is_won")->default(0);
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('category_id');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nominations');
    }
}
