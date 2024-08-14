<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionnairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionnaires', function (Blueprint $table) {
            $table->id();
            $table->integer('website_id')->nullable();
            $table->string('owner', 50)->nullable();
            $table->string('owner_email', 100)->nullable();
            $table->string('company_name', 255)->nullable();
            $table->string('projected_domain', 100)->nullable();
            $table->string('modal_domain', 255)->nullable();
            $table->text('description')->nullable();
            $table->text('mission')->nullable();
            $table->text('website_design')->nullable();
            $table->string('contact', 255)->nullable();
            $table->string('tabs', 255)->nullable();
            $table->string('instagram', 100)->nullable();
            $table->string('facebook', 100)->nullable();
            $table->string('twitter', 100)->nullable();
            $table->char('collect_payments', 1)->default('N');
            $table->char('merchant_account', 1)->default('N');
            $table->string('collection_types', 255)->nullable();
            $table->string('logo', 100)->nullable();
            $table->date('projected_due_date')->nullable();
            $table->double('total_cost', 15, 2)->nullable();
            $table->char('completed', 1)->default('N');
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
        Schema::dropIfExists('questionnaires');
    }
}
