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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('employee_number')->unique();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('address')->nullable()
            ->unique();
            $table->foreignId('department_id')
                  ->nullable()
                  ->constrained('departments')
                  ->onDelete('cascade');
            $table->foreignId('user_id')
             ->nullable()
             ->constrained('users')
             ->onDelete('cascade');
            $table->foreignId('position_id')
             ->nullable()
             ->constrained('positions')
             ->onDelete('cascade');
            $table->timestamps();
            $table->foreignId('employment_status_id')
            ->nullable()
            ->constrained('employment_statuses');
             $table->foreignId('salary_rate_id')
            ->constrained('salary_rates');
            $table->date('date_hired');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
