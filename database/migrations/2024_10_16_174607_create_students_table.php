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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            // Define teacher_id as an integer without a foreign key constraint
            $table->unsignedBigInteger('teacher_id')->nullable(); // Keep it nullable if needed
            $table->string('student_name');
            $table->date('admission_date');
            $table->decimal('yearly_fees', 8, 2);
            $table->string('contact_no')->nullable();
            $table->string('email')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
};
