<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('students', function (Blueprint $table) {
        $table->string('phone')->nullable()->after('email');
        $table->integer('age')->nullable()->after('phone');
        $table->date('date_of_birth')->nullable()->after('age');
        $table->text('address')->nullable()->after('date_of_birth');
        $table->string('gender')->nullable()->after('address');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn(['phone', 'age', 'date_of_birth', 'address', 'gender']);
        });
    }
};
