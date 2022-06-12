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
        Schema::create('candidato_eleicao', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('eleicao_id')->constrained()->onDelete('cascade');
            $table->foreignId('candidato_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidato_eleicao');
    }
};
