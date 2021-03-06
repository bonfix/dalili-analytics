<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateSessionPages
 */
class CreateSessionPages extends Migration
{
    protected $tableName;
    public function __construct()
    {
        $this->tableName = config('analytics.table_prefix', '').'session_'.'pages';
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('at');
            $table->integer('session_id');
            $table->string('name', 255);
            $table->integer('duration')->nullable();
            $table->string('previous_page', 255)->nullable();
            $table->string('next_page', 255)->nullable();
            $table->boolean('is_modal');
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
        Schema::dropIfExists($this->tableName);
    }
}
