<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_jabatan');
            $table->string('nik');
            $table->string('no_telp');
            $table->date('tgl_lahir');
            $table->string('jenis_kelamin');
            $table->text('alamat');
            $table->string('agama');
            $table->string('cover');
            $table->timestamps();

            // Foreign keys
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_jabatan')->references('id')->on('jabatans')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
};
