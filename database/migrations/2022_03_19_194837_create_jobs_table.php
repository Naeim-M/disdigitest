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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->default(null);
            $table->bigInteger('cat_id');
            $table->string('name');
            $table->string('code')->unique()->nullable();
            $table->string('mobile')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('userfax')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->text('summary')->nullable();
            $table->text('description')->nullable();
            $table->string('city');
            $table->text('address')->nullable();
            $table->decimal('lng', 10, 7);
            $table->decimal('lat', 10, 7);
            $table->string('postalcode')->nullable();
            $table->string('video')->nullable();
            $table->string('region')->nullable();
            $table->string('servlang')->nullable();
            $table->string('level')->nullable();
            $table->string('source')->nullable()->default(0);
            $table->timestamp('strtd')->nullable();
            $table->string('title')->nullable();
            $table->string('keyword')->nullable();
            $table->text('seodscr')->nullable();
            $table->string('website')->nullable();
            $table->string('p360')->nullable();
            $table->tinyinteger('rate')->default(0);
            $table->boolean('activation')->default(false);
            $table->string('skey')->nullable();
            $table->string('username')->nullable();
            $table->string('useremail')->nullable();
            $table->text('services')->nullable();
            $table->text('tag')->nullable();
            $table->text('servcity')->nullable();
            $table->text('other1')->nullable();
            $table->text('other2')->nullable();
            $table->string('password');
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
        Schema::dropIfExists('jobs');
    }
};
