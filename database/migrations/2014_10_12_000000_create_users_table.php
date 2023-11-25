<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone',13);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('role')->default(1)->comment("
            1 => Admin
            2 => Petugas Registrasi
            3 => Dokter
            4 => Petugas Obat
            ");
            $table->integer('status')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'name' => 'Admin',
            'phone' => '0000',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 1,
            'status' => 1,
        ]);

        // Petugas Registrasi
        DB::table('users')->insert([
            'name' => 'Petugas Registrasi',
            'phone' => '1234567890123',
            'email' => 'petugas_registrasi@example.com',
            'password' => Hash::make('password'),
            'role' => 2,
            'status' => 1,
        ]);

        // Dokter
        DB::table('users')->insert([
            'name' => 'Dokter',
            'phone' => '1234567890123',
            'email' => 'dokter@example.com',
            'password' => Hash::make('password'),
            'role' => 3,
            'status' => 1,
        ]);

        // Petugas Obat
        DB::table('users')->insert([
            'name' => 'Petugas Obat',
            'phone' => '1234567890123',
            'email' => 'petugas_obat@example.com',
            'password' => Hash::make('password'),
            'role' => 4,
            'status' => 1,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
