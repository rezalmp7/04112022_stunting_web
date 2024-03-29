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
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->string("nama")->length(100);
            $table->bigInteger("nik")->length(100);
            $table->bigInteger("kk")->length(100);
            $table->date("tglLahir");
            $table->string("tmpLahir")->length(100);
            $table->enum('jenis_kelamin', [1, 2])->comment('1 - laki laki, 2 - perempuan');
            $table->string("alamat")->length(100);
            $table->string("orangTua")->length(100);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasiens');
    }
};
