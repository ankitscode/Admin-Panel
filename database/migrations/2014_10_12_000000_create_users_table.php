<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('birthdate')->nullable(); 
            $table->integer('usertype')->default(2)->comment('1->admin, 2->user');
            $table->tinyInteger('is_active')->default(1)->comment('0->de-active, 1->active');
            $table->text('media_id')->nullable();
            $table->unsignedBigInteger('gender_type')->nullable()->comment('lockup');
            $table->unsignedBigInteger('city_type')->nullable()->comment('lockup');
            $table->unsignedBigInteger('country_type')->nullable()->comment('lockup');
            $table->text('address')->nullable()->comment('lockup');
            $table->string('device_token')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->text('uuid')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
