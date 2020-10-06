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

class CreateCommentableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('comment_id');
            $table->morphs('commentable');
            $table->morphs('commenter');
            $table->timestamps();

            $table->unique(['comment_id', 'commentable_id', 'commentable_type'], 'commentable_ids_type_unique');
            $table->unique(['commenter_id', 'commenter_type'], 'commenter_ids_type_unique');

            $table->foreign('comment_id')
                ->references('id')
                ->on('comments')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commentable');
    }
}
