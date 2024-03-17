<?php

namespace App\Http\Controllers;

use Modules\Article\Http\Resources\ArticleEssentialResource;
use Modules\Article\Repositories\ArticleRepo;
use Modules\Brand\Http\Resources\BrandEssentialResource;
use Modules\Brand\Repositories\BrandRepo;
use Modules\Category\Http\Resources\CategoryParentsResource;
use Modules\Category\Repositories\CategoryRepo;
use Modules\Product\Http\Resources\ProductEssentialResource;
use Modules\Product\Repositories\ProductRepo;
use Modules\Slider\Http\Resource\SliderResource;
use Modules\Slider\Repositories\SliderRepo;

class PageController extends Controller
{
    public function home()
    {
        $data = [];

        $data['sliders'] = SliderResource::collection(SliderRepo::index());

        $data['categories'] = CategoryParentsResource::collection(CategoryRepo::parents());

        $data['special_offers'] = ProductEssentialResource::collection(ProductRepo::specialOffers());

        $data['full_width_banners'] = [];

        $data['best_sellers'] = ProductEssentialResource::collection(ProductRepo::bestSellers());

        $data['brands'] = BrandEssentialResource::collection(BrandRepo::featuring());

        $data['half_width_banners'] = [];

        $data['articles'] = ArticleEssentialResource::collection(ArticleRepo::latest());

        return $data;
    }
}
