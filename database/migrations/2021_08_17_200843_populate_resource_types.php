<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\ResourceTypes;

class PopulateResourceTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $table = new ResourceTypes();
        $table->name = 'BaseResources';
        $table->save();
        $table = new ResourceTypes();
        $table->name = 'Ores';
        $table->save();
        $table = new ResourceTypes();
        $table->name = 'Ingots';
        $table->save();
        $table = new ResourceTypes();
        $table->name = 'Items';
        $table->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table = new ResourceTypes();
        $table->whereIn('name',['BaseResources','Ores','Ingots','Items'])->delete();
    }
}
