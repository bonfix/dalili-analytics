<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateSessionBaskets
 */
class CreateSessionBaskets extends Migration
{
    protected $tableName;
    public function __construct()
    {
        $this->tableName = config('analytics.table_prefix', '').'session_'.'baskets';
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
            $table->string('local_basket_id', 255);
            $table->integer('shop_id');
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
