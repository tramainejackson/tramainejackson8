<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('websites', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name', 25)->nullable();
            $table->string('title', 25)->nullable();
            $table->text('description')->nullable();
            $table->string('link', 100)->nullable();
            $table->string('owner', 50)->nullable();
            $table->string('owner_email', 100)->nullable();
            $table->string('logo', 100)->nullable();
            $table->date('renew_date')->nullable();
            $table->date('last_paid_date')->nullable();
            $table->double('amount_due', 15,2)->nullable();
            $table->char('active', 1)->nullable();
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('websites');
    }
}
