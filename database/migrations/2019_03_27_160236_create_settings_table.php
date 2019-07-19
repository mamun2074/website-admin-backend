<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string("company_name")->nullable();
            $table->string("title")->nullable();
            $table->string('address')->nullable();
            $table->string('company_logo_main')->nullable();
            $table->string('company_logo_favicon')->nullable();

            $table->string('page_banner')->nullable();

            $table->string('footer_about')->nullable();

            $table->string('customer_support_number')->nullable();
            $table->string('customer_support_email')->nullable();
            $table->string('location')->nullable();
            $table->string('working_hour')->nullable();


            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedIn')->nullable();
            $table->string('youtube')->nullable();
            $table->string('instragram')->nullable();

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
        Schema::dropIfExists('settings');
    }
}
