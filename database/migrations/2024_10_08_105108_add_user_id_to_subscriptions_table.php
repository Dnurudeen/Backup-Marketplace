<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('id'); // Assuming you want to add it after the id column
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // Check if the column doesn't already exist before adding it
            // if (!Schema::hasColumn('subscriptions', 'user_id')) {
            //     $table->unsignedBigInteger('user_id')->after('id');
            //     $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            // if (Schema::hasColumn('subscriptions', 'user_id')) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            // }
        });
    }
}
