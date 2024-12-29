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
        Schema::create('treatment_plannings', function (Blueprint $table) {
            $table->id();
            $table->float('deficit_a')->nullable()->default(0);
            $table->float('incisor_inclination_up')->nullable()->default(0);
            $table->float('value_3_3_vc')->nullable()->default(0);
            $table->float('value_4_4_vc')->nullable()->default(0);
            $table->float('value_5_5_vc')->nullable()->default(0);
            $table->float('value_6_6_vc')->nullable()->default(0);
            $table->float('distalization_i')->nullable()->default(0);
            $table->float('distalization_ii')->nullable()->default(0);
            $table->float('derotation_16')->nullable()->default(0);
            $table->float('derotation_26')->nullable()->default(0);
            $table->float('separation')->nullable()->default(0);
            $table->float('incisor_inclination_down')->nullable()->default(0);
            $table->float('value_3_3_nc')->nullable()->default(0);
            $table->float('value_4_4_nc')->nullable()->default(0);
            $table->float('value_5_5_nc')->nullable()->default(0);
            $table->float('value_6_6_nc')->nullable()->default(0);
            $table->float('distalization_iii')->nullable()->default(0);
            $table->float('distalization_iv')->nullable()->default(0);
            $table->float('separation_nc')->nullable()->default(0);
            $table->float('space_nc')->nullable()->default(0);
            $table->float('space_vc')->nullable()->default(0);
            $table->float('sepDown')->nullable()->default(0);
            $table->float('sepUp')->nullable()->default(0);

            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('patient_id')->nullable();
            $table->timestamps();

            $table->index('user_id', 'treatment_planning_user_idx');
            $table->foreign('user_id','treatment_planning_user_fk')->references('id')->on('users')->onDelete('cascade');;
            $table->index('patient_id', 'treatment_planning_patient_idx');
            $table->foreign('patient_id','treatment_planning_patient_fk')->references('id')->on('patients')->onDelete('cascade');;

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treatment_plannings');
    }
};
