<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{

    public bool $autoId = false;

    public function up(): void
    {

        $this->table('pages')
                ->addColumn('id', 'integer', [
                    'autoIncrement' => true,
                    'default' => null,
                    'limit' => 10,
                    'null' => false,
                    'signed' => false,
                ])
                ->addColumn('name', 'string', [
                    'default' => null,
                    'limit' => 100,
                    'null' => false,
                ])
                ->addColumn('alias', 'string', [
                    'default' => null,
                    'limit' => 100,
                    'null' => false,
                ])
                ->addColumn('content', 'text', [
                    'default' => null,
                    'limit' => 16777215,
                    'null' => false,
                ])
                ->addColumn('seo_title', 'string', [
                    'default' => null,
                    'limit' => 160,
                    'null' => true,
                ])
                ->addColumn('seo_description', 'string', [
                    'default' => null,
                    'limit' => 280,
                    'null' => true,
                ])
                ->addColumn('seo_keywords', 'string', [
                    'default' => null,
                    'limit' => 100,
                    'null' => true,
                ])
                ->addColumn('created', 'datetime', [
                    'default' => null,
                    'limit' => null,
                    'null' => true,
                ])
                ->addColumn('modified', 'datetime', [
                    'default' => null,
                    'limit' => null,
                    'null' => true,
                ])
                ->addPrimaryKey('id')
                ->addIndex('alias', ['unique' => true])
                ->create();

        $this->table('pages_i18n')
                ->addColumn('id', 'integer', [
                    'default' => null,
                    'limit' => 10,
                    'signed' => false,
                    'null' => false,
                ])
                ->addColumn('locale', 'string', [
                    'default' => null,
                    'limit' => 5,
                    'null' => false,
                ])
                ->addColumn('name', 'string', [
                    'default' => null,
                    'limit' => 100,
                    'null' => true,
                ])
                ->addColumn('content', 'text', [
                    'default' => null,
                    'limit' => 16777215,
                    'null' => true,
                ])
                ->addColumn('seo_title', 'string', [
                    'default' => null,
                    'limit' => 160,
                    'null' => true,
                ])
                ->addColumn('seo_description', 'string', [
                    'default' => null,
                    'limit' => 280,
                    'null' => true,
                ])
                ->addColumn('seo_keywords', 'string', [
                    'default' => null,
                    'limit' => 100,
                    'null' => true,
                ])
                ->addPrimaryKey(['id', 'locale'])
                ->create();
    }

    public function down(): void
    {
        $this->table('pages')->drop()->save();
        $this->table('pages_i18n')->drop()->save();
    }
}
