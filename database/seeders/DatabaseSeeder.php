<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Address\Database\Seeders\AddressDatabaseSeeder;
use Modules\Admin\Database\Seeders\AdminDatabaseSeeder;
use Modules\Article\Database\Seeders\ArticleDatabaseSeeder;
use Modules\Attribute\Database\Seeders\AttributeDatabaseSeeder;
use Modules\Banner\Database\Seeders\BannerDatabaseSeeder;
use Modules\Bookmark\Database\Seeders\BookmarkDatabaseSeeder;
use Modules\Brand\Database\Seeders\BrandDatabaseSeeder;
use Modules\Category\Database\Seeders\CategoryDatabaseSeeder;
use Modules\Client\Database\Seeders\ClientDatabaseSeeder;
use Modules\Comment\Database\Seeders\CommentDatabaseSeeder;
use Modules\Order\Database\Seeders\OrderDatabaseSeeder;
use Modules\Product\Database\Seeders\ProductDatabaseSeeder;
use Modules\Slider\Database\Seeders\SliderDatabaseSeeder;
use Modules\Variant\Database\Seeders\VariantDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(AdminDatabaseSeeder::class);
        $this->call(ClientDatabaseSeeder::class);
        $this->call(AddressDatabaseSeeder::class);
        $this->call(CategoryDatabaseSeeder::class);
        $this->call(BrandDatabaseSeeder::class);
        $this->call(ProductDatabaseSeeder::class);
        $this->call(AttributeDatabaseSeeder::class);
        $this->call(VariantDatabaseSeeder::class);
        $this->call(CommentDatabaseSeeder::class);
        $this->call(OrderDatabaseSeeder::class);
        $this->call(ArticleDatabaseSeeder::class);
        $this->call(SliderDatabaseSeeder::class);
        $this->call(BookmarkDatabaseSeeder::class);
        $this->call(BannerDatabaseSeeder::class);
    }
}
