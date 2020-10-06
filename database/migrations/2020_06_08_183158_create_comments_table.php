<?php

/*
 * This file is part of Strix.
 *
 * For detailed copyright and license information, please view the
 * LICENSE file that was distributed with this source code.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            $table->string('uid', 21)->index();

            $table->longText('content');
            $table->unsignedBigInteger('commenter_id');
            $table->string('commenter_type')->nullable();
            $table->index(["commenter_id", "commenter_type"]);
            $table->string("commentable_type");
            $table->uuid("commentable_id");
            $table->index(["commentable_type", "commentable_id"]);

            $table->timestamps();
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
        Schema::dropIfExists('comments');
    }
}
