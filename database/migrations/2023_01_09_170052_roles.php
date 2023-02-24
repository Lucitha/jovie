<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Roles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('roles_name');
            $table->string('roles_description');
            $table->dateTime('updated_at')->nullable();
            $table->dateTime('created_at');
        });

        DB::table('roles')->insert(
            array(
                'id'=>1,
                'roles_name' => 'Admin',
                'roles_description' => 'User owner',
                'created_at'=>date('Y-m-d H:i:s'),
            ),
        );
        DB::table('roles')->insert(
            array(
                'id'=>2,
                'roles_name' => 'Company',
                'roles_description' => 'User who can post an offer',
                'created_at'=>date('Y-m-d H:i:s'),
                )
        );
        DB::table('roles')->insert(
            array(
                'id'=>3,
                'roles_name' => 'Candidate',
                'roles_description' => 'User who can apply for an offer',
                'created_at'=>date('Y-m-d H:i:s'),
            ),

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
