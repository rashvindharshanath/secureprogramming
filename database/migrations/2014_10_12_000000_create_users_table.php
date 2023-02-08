<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('users')) {
            return;
        } else{
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->rememberToken();
                $table->timestamps();
                $table->string('role')->default('user');

                $table->string('google_id')->nullable();


            });
        }

        

        if (Schema::hasTable('complaints')) {
            return;
        } else{
            Schema::create('complaints', function (Blueprint $table) {
                $table->id();
                $table->string('user_id');
                $table->string('name');
                $table->string('house_no_block');
                $table->longText('complaint_text');
            });
        }


        if (Schema::hasTable('bookings')) {
            return;
        } else{
            Schema::create('bookings', function (Blueprint $table) {
                $table->id();
                $table->string('user_id');
                $table->string('name');
                $table->string('phone');
                $table->string('house_no_block');
                $table->string('booking_date');
                $table->string('booked_item');
                $table->string('time');
            });
        }

        if (Schema::hasTable('items')) {
            return;
        } else{
            Schema::create('items', function (Blueprint $table) {
                $table->id();
                $table->string('item_name');
                $table->string('picture_link');
            });
        }

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('complaints');
        Schema::dropIfExists('bookings');
        Schema::dropIfExists('items');
    }
};
