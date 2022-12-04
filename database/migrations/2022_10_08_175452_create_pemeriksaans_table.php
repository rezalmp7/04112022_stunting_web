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
        Schema::create('pemeriksaans', function (Blueprint $table) {
            $table->id();
            $table->integer('pasien_id');
            $table->double('tinggi_badan');
            $table->double('berat_badan');
            $table->double('lingkar_kepala');
            $table->double('lingkar_badan');
            $table->text('catatan');
            $table->enum('kategori', ['sehat', 'kurang gizi']);
            $table->string('namaDokter')->length(100);
            $table->string('created_by')->length(100);
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
        Schema::dropIfExists('pemeriksaans');
    }
};
