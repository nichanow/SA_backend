<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignIdFor(\App\Models\User::class)->default(null);
            $table->string('title');
            $table->string('accused_name');
            $table->string('complainer_name');
            $table->longText('detail');
            $table->enum('type', ['examine']);
            $table->enum('province', ['กำแพงเพชร', 'ชัยนาท', 'นครนายก', 'นครสวรรค์', 
            'นครปฐม', 'นนทบุรี', 'ปทุมธานี', 'พระนครศรีอยุธยา', 'พิจิตร', 'พิษณุโลก','เพชรบูรณ์', 'ลพบุรี', 'สมุทรปราการ', 'สระบุรี', 'สุโขทัย', 'สุพรรณบุรี'
            , 'อ่างทอง', 'อุทัยธานี']);
            $table->longText('pdf_file');
            $table->softDeletes();

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('works');
    }
}
