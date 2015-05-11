<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class CreatePostTable extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table("types_post");
        $table->addColumn("name","string")
            ->create();

        $table = $this->table("posts");
        $table->addColumn("title","string")
            ->addColumn("alias","string")
            ->addIndex("alias",array("unique"=>true))
            ->addColumn("type","integer")
            ->addForeignKey("type","types_post")
            ->create();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        if($this->hasTable('posts')){
            $this->dropTable("posts");
        }
        if($this->hasTable('types_post')){
            $this->dropTable("types_post");
        }
    }
}