<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    protected $categories;

    public function __construct() {
        $this->categories =  Article::select('category')->distinct()->get();
    }

    public function index() {
        $articles =  DB::table('articles')
        ->orderBy('created_at', 'DESC')
        ->paginate(10);
        

        return view('newsfeed', [
            'articles' => $articles,
            'categories' => $this->categories
            
        ]);
        
    }

    public function filterByCategory(Request $request) {
        
        $articles = DB::table('articles')
            ->where('category', $request['filter'])
            ->orderBy('created_at','DESC')
            ->get();
        
        return view('newsfeed',[
            'articles' => $articles,
            'categories' => $this->categories
        ]);
    }
    
    public function show($id) {

        

        $article = DB::table('articles')
            ->where('id', $id)
            ->get();

            
        return view('show',[
            'article' => $article
        ]);
    }

    public function managerDashboard() {
        $articles =  DB::table('articles')
        ->orderBy('created_at', 'DESC')
        ->simplePaginate(10);
        

        return view('manager', [
            'articles' => $articles,          
        ]);
    }

    public function storeArticle(Request $request) {
        
        $validetedData = $request->validate([
            'title' => 'required',
            'text' =>'required',
            'category' => 'required'
        ]);

        $article = new Article;
        $article->title = $request->input('title');
        $article->text = $request->input('text');
        $article->category = $request->input('category');
        $article->save();


        return redirect('manager');
    }

    public function edit($id)
    {
        
        $article = Article::find($id);

        return view('edit',[
            'article' => $article
        ]);
    }

    public function update(Request $request, $id) {

        $validetedData = $request->validate([
            'title' => 'required',
            'text' =>'required',
            'category' => 'required'
        ]);

        $article = Article::find($id);
        $article->title = $request->input('title');
        $article->text = $request->input('text');
        $article->category = $request->input('category');
        $article->save();

        return redirect('manager');
    }

    public static function destroy($id) {
        $article = Article::find($id);
        $article->delete();

        return redirect('manager');
    }
}
