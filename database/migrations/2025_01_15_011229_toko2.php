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
        Schema::create('penjualan', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->integer('id_pelanggan');
            $table->date('tgl_transaksi');;
            $table->integer('total_transaksi');
            $table->timestamps();
        });

        Schema::create('detil_penjualan', function (Blueprint $table) {
            $table->id('id_transaksi_detil');
            $table->integer('id_transaksi');
            $table->integer('id_barang');
            $table->integer('jml_barang');
            $table->integer('harga_satuan');
            $table->timestamps();
        });

        Schema::create('user', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('username');
            $table->string('password');
            $table->enum('role',['ADMIN','PEGAWAI']);
            $table->timestamps();
        });
        
        Schema::create('barang', function (Blueprint $table) {
            $table->id('id_barang');
            $table->string('nama_barang');
            $table->integer('harga_barang');
            $table->integer('stok');
            $table->timestamps();
        });

        Schema::create('pelanggan', function (Blueprint $table) {
            $table->id('id_pelanggan');
            $table->string('nama');
            $table->enum('role',['P','L']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualan');
        Schema::dropIfExists('detil_penjualan');
        Schema::dropIfExists('user');
        Schema::dropIfExists('barang');
        Schema::dropIfExists('pelanggan');
    }
};
