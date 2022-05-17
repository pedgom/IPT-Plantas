<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('demo_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->string('name');
            $table->text('body');
            $table->string('optional')->nullable();
            $table->text('body_optional')->nullable();
            $table->decimal('value', 10,2)->nullable();
            $table->date('date')->nullable();
            $table->dateTime('datetime')->nullable()->default(null);
            $table->boolean('checkbox')->default(false);
            $table->boolean('privacy_policy')->default(false);
            $table->smallInteger('status')->default(1)->comment("1 - Active | 2 - Disable | 3 - Draft");
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
        Schema::dropIfExists('demos');
    }
}
