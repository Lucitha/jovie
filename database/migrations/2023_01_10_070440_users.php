<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('users', function (Blueprint $table) {            
            $table->id();             
            $table->string('users_name')->nullable();             
            $table->string('users_email');             
            $table->string('users_address')->nullable();             
            $table->string('users_jobs')->nullable();             
            $table->string('users_phone')->nullable();             
            $table->string('username')->nullable();             
            $table->string('users_password');             
            $table->string('users_post_office_box')->nullable();             
            $table->string('business_number')->nullable();             
            $table->string('users_social_link')->nullable();             
            $table->string('users_description')->nullable();             
            $table->string('users_picture')->nullable();             
            $table->tinyInteger('users_flag')->default(0);             
            $table->foreignId('roles_id')->references('id')->on('roles');             
            $table->dateTime('created_at');         
            $table->dateTime('updated_at')->nullable();             
        });

        DB::table('users')->insert(
            array(
                'users_name'=>'Admin',
                'users_email' => 'admin@gmail.com',
                'users_flag'=>1,
                'roles_id'=>1,
                'users_password' => '$2y$10$cn0RmUfTr0LoSSArZu3FJeL7jc.MeweJsVcFbveHjCpe2r5BgQ.Ei',
                'created_at' => date('Y-m-d H:i:s'),
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
