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
        Schema::create('biometrics', function (Blueprint $table) {
            $table->id();
            $table->float('tonIndex');
            $table->float('adjustmentUpper');
            $table->float('adjustmentLower');
            $table->float('ponWidth_14_24');
            $table->float('ponWidth_16_26');
            $table->float('ponWidth_44_34');
            $table->float('ponWidth_46_36');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('patient_id')->nullable();
            $table->softDeletes();
            $table->timestamps();


            $table->index('user_id', 'biometric_user_idx');
            $table->foreign('user_id','biometric_user_fk')->references('id')->on('users')->onDelete('cascade');;
            $table->index('patient_id', 'biometric_patient_idx');
            $table->foreign('patient_id','biometric_patient_fk')->references('id')->on('patients')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biometrics');
    }
};
