<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('Order', function (Blueprint $table) {
            if (!Schema::hasColumn('Order', 'updated_at')) {
                $table->timestamp('updated_at')->nullable();
            }
        });
    }

    public function down()
    {
        Schema::table('Order', function (Blueprint $table) {
            if (Schema::hasColumn('Order', 'updated_at')) {
                $table->dropColumn('updated_at');
            }
        });
    }
};