<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use \Illuminate\Support\Facades\Schema;
use Saman\BarekatElectronicHealth\App\Models\Category;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string(Category::COLUMN_TITLE)->unique();
            $table->unsignedBigInteger(Category::COLUMN_PARENT_ID)->index()->nullable();
            $table->unsignedTinyInteger(Category::COLUMN_IS_ACTIVE)->index();
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
        Schema::dropIfExists('categories');
    }
}