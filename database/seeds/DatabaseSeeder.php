<?php

use App\Model\Brandjsm;
use App\Model\LineStoryModel;
use App\Model\ProductDesciptionModel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProductTableSeeds::class);
        $this->call(ProductDetailsTableSeed::class);
        $this->call(ProductDescTableSeeder::class);
        $this->call(CategoryTableSeeds::class);
        // $this->call(ColorTableSeeds::class);
        // $this->call(ProductDetailsTableSeed::class);
        //$this->call(Brand_magazineTableDataSeeds::class);
        $this->call(EventTableSeeds::class);
        $this->call(BrandJsmTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(NoticeTableSeeder::class);
        $this->call(ArtistTipTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ArtistMagTableSeeder::class);
        $this->call(LinestoryTableSeeds::class);
        $this->call(LinestoryDescriptionTableSeeder::class);
        $this->call(FindStoreTableSeeder::class);
        $this->call(BannerTableSeeder::class);
        $this->call(PopUpTableSeeder::class);
        $this->call(VideoTableSeeder::class);
        $this->call(MenuTableSeeder::class);
        $this->call(QacateTableSeeder::class);
        $this->call(QatopicTableSeeder::class);

        $this->call(MenugroupTableSeeder::class);
        $this->call(MenuprocessTableSeeder::class);
        $this->call(MenumainTableSeeder::class);
      $this->call(MenusubTableSeeder::class);
        $this->call(LangprocessTableSeeder::class);
        $this->call(LangTableSeeder::class);
        $this->call(ReviewTableSeeder::class);
        $this->call(FaqTableSeeder::class);
       $this->call(Faq_cateTableSeeder::class);
       $this->call(FindStoreCateTableSeeder::class);


    }
}
