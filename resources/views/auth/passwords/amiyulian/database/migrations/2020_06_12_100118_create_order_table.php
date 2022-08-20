<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pengirim', '50');
            $table->string('nama_penerima', '50');
            $table->string('email', '50');
            $table->string('no_hp', '20');
            $table->string('provinsi', '30');
            $table->string('kabupaten', '30');
            $table->string('kecamatan', '30');
            $table->integer('kode_pos');
            $table->text('alamat_lengkap');
            $table->text('pesan_tambahan')->nullable();
            $table->string('no_resi', '30');
            $table->string('kurir', '30');
            $table->string('ongkir', '30');
            $table->integer('total')->unsigned();
            $table->string('diskon','30')->nullable();
            $table->string('status','20');
            $table->string('bukti_tf')->nullable();;
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
        Schema::dropIfExists('orders');
    }
}
