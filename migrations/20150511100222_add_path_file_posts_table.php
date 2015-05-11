<?php

use Phinx\Migration\AbstractMigration;

class AddPathFilePostsTable extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table("posts");
        $table->addColumn("image_path","string",array("null"=>true))
            ->save();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table("posts");
        $table->removeColumn("image_path")
            ->save();
    }
}