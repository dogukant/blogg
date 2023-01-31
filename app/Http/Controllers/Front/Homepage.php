<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Article;
use App\Models\Category;
use App\Models\Page;

class Homepage extends Controller
{
    public function __construct()
    {
        view()->share('pages',Page::orderBy('order','ASC')->get());
        view()->share('categories',Category::inRandomOrder()->get());

    }

    public function index(){
        $data['articles']=Article::orderBy('created_at','DESC')->paginate(2);
        $data['articles']->withPath(url('sayfa'));
        return view('front.homepage',$data);
    }


    public function single($category,$slug){
        $category=Category::firstwhere('slug',$category) ?? abort(403,'böyle bir yazı bulamadık');
        $article=Article::whereSlug($slug)->firstwhere('id',$category->id) ?? abort(403,'böyle bir yazı bulamadık');
        $article->increment('hit');
        $data['article']=$article;
        return view('front.single',$data);
    }

    public function category($slug){
        $category=Category::firstwhere('slug',$slug) ?? abort(403,'böyle bir yazı bulamadık');
        $data['category']=$category;
        $data['articles']=Article::where('category_id', $category->id)->orderBY('created_at','DESC')->paginate(1);
        return view('front.category',$data);
    }

    public function page($slug){
        $page=Page::firstwhere('slug',$slug) ?? abort(403, 'böyle bir sayfa bulunamadı');
        $data['page']=$page;
        return view('front.page',$data);
    }

    public function contact(){

        return view('front.contact');
    }

    public function contactpost(Request $request){
        print_r($request->post());

    }
}
