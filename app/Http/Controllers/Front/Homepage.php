<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

//Models
use App\Models\Article;
use App\Models\Category;
use App\Models\Page;
use App\Models\contact;

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

    public function single($slug){

        $article=Article::whereSlug($slug)->first();
        if ($article){
            $article->increment('hit');
            return view('front.single',[
                'article' =>$article
            ]);
        }
       return abort(404, 'Böyle bir yazı bulamadıkkkk');

    }

    public function category($slug){
        $category=Category::whereSlug($slug)->first() ?? abort(403,'böyle bir yazı bulamadık');
        $data['category']=$category;
        $data['articles']=Article::where('category_id', $category->id)->orderBY('created_at','DESC')->paginate(2);
        return view('front.category',$data);
    }

    public function page($slug){
        $page=Page::where('slug',$slug)->first() ?? abort(403, 'böyle bir sayfa bulunamadı');
        $data['page']=$page;
        return view('front.page',$data);
    }

    public function contact(){

        return view('front.contact');
    }

    public function contactpost(Request $request){
        $validated = $request->validate([
            'name'=>'required|min:5|max:255',
            'email'=>'required|email|max:255',
            'topic'=>'required|max:255',
            'message'=>'required|min:10|max:2000'
        ],
        [
            'name.required' => 'İsim alanı zorunludur',
            'name.min' => 'Ad Soyadınız çok kısa',
            'email.required' => 'Mail adresiniz zorunludur',
            'message.required' => 'Mesaj alanı zorunludur',
            'message.min' => 'Mesajınız çok kısa'
        ]);

        Contact::create($validated);

        return redirect()->route('contact')->with('success','Mesajınız gönderildi');
    }
}
