<?php

namespace App\Http\Controllers\Facades;

use App\Article;
use Illuminate\Support\Facades\Facade;

class CategoryController extends Facade
{

    protected static function getFacadeAccessor() {
        
        return 'getCategories';
    }

    public static function getCategories() {
        return $categories =  Article::select('category')->distinct()->get();
    }
}