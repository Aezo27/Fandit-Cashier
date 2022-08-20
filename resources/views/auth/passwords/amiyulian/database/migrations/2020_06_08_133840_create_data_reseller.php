<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataReseller extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_reseller', function (Blueprint $table) {
            $table->id();
            $table->string('nama_toko', '50');
            $table->string('nama','50')->nullable();
            $table->string('no_hp', '15')->nullable();
            $table->text('alamat')->nullable();
            $table->string('foto_profil', '30')->nullable();
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
        Schema::dropIfExists('data_reseller');
    }
}
