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
        Schema::create('side_twg', function (Blueprint $table) {
            $table->id();
            $table->string('image_path')->nullable()->default(0);
            $table->float('SNA')->nullable()->default(0);
            $table->float('SNB')->nullable()->default(0);
            $table->float('ANB')->nullable()->default(0);
            $table->float('Wits')->nullable()->default(0);
            $table->float('Beta')->nullable()->default(0);
            $table->float('SNMP')->nullable()->default(0);
            $table->float('SNNL')->nullable()->default(0);
            $table->float('NLMP')->nullable()->default(0);
            $table->float('Go')->nullable()->default(0);
            $table->float('SGoNMe')->nullable()->default(0);
            $table->float('ISN')->nullable()->default(0);
            $table->float('INL')->nullable()->default(0);
            $table->float('IMP')->nullable()->default(0);
            $table->float('Ii')->nullable()->default(0);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('patient_id')->nullable();
            $table->timestamps();


            $table->index('user_id', 'side_twg_user_idx');
            $table->foreign('user_id','side_twg_user_fk')->references('id')->on('users')->onDelete('cascade');;
            $table->index('patient_id', 'side_twg_patient_idx');
            $table->foreign('patient_id','side_twg_patient_fk')->references('id')->on('patients')->onDelete('cascade');;

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('side_twg');
    }
};
