<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeleaverecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employeeleaverecords', function (Blueprint $table) {
            $table->bigIncrements('record_id');
            $table->string('employeeid');
            $table->string('no_of_leaves');
            $table->string('from_date');
            $table->string('to_date');
            $table->string('reason_of_leave');
            $table->string('file_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employeeleaverecords');
    }
}
