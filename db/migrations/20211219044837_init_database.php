<?php

use Phinx\Migration\AbstractMigration;

final class InitDatabase extends AbstractMigration
{
    /**
     * Initialize the database
     */
    public function change(): void
    {
        // Users
        $users = $this->table('users');
        $users->addColumn('uuid', 'string')
            ->addColumn('email', 'string')
            ->addColumn('name', 'string')
            ->addColumn('password', 'string')
            ->addColumn('is_deleted', 'boolean', ['default' => false])
            ->addColumn('is_approved', 'boolean', ['default' => false])
            ->addColumn('is_admin', 'boolean', ['default' => false])
            ->addColumn('created_at', 'datetime')
            ->addColumn('updated_at', 'datetime')
            ->create();

        $users->addIndex('uuid', array('unique' => true))->save();
        $users->addIndex('email', array('unique' => true))->save();


        // Blog Posts
        $posts = $this->table('blog_posts');
        $posts->addColumn('uuid', 'string')
            ->addColumn('title', 'string')
            ->addColumn('content', 'string')
            ->addColumn('type', 'string')
            ->addColumn('is_private', 'boolean', ['default' => false])
            ->addColumn('is_deleted', 'boolean', ['default' => false])
            ->addColumn('created_at', 'datetime')
            ->addColumn('updated_at', 'datetime')
            ->create();

        $posts->addIndex('uuid', array('unique' => true))->save();

        // User Comments
        $comments = $this->table('user_comments');
        $comments->addColumn('uuid', 'string')
            ->addColumn('user_uuid', 'string')
            ->addColumn('comment_text', 'string')
            ->addColumn('created_at', 'datetime')
            ->addColumn('updated_at', 'datetime')
            ->create();

        $comments->addIndex('uuid', array('unique' => true))->save();

        // Gallery Posts
        $gallery = $this->table('gallery_posts');
        $gallery->addColumn('uuid', 'string')
            ->addColumn('title', 'string')
            ->addColumn('image_path', 'string')
            ->addColumn('description', 'string')
            ->addColumn('is_deleted', 'boolean', ['default' => false])
            ->addColumn('created_at', 'datetime')
            ->addColumn('updated_at', 'datetime')
            ->create();

        $gallery->addIndex('uuid', array('unique' => true))->save();
    }
}
