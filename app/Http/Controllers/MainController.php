<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    public function index(){
        $title = 'Home page';
        $subtitle = '<h2>Subtitle</h2>';
        $arr = ['one','two','three'];
        $articles =  Article::orderByDesc('created_at')->with(['category','tags'])->take(5)->get();
        return view('home', compact('title','subtitle','arr','articles'));
    }

    public function contacts(){

        $title = 'contacts';
        return view('contacts',compact('title'));
    }

    public function getContactsForm(Request $request){
       // dump($request->all());

       $validated = $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'message'=>'required|min:3',

        ]);

        //return redirect('contacts')->with('success','Thank u!');
        //return redirect()->route('mail')->with('success','Thank u!');
        return to_route('thanx')->with('success','Thank u!');
    }

    public function category(Category $category){
       //dd($category->articles()->paginate(15));

        $articles = Article::where('category_id','=',$category->id)->paginate(3);
        return view('content.category',compact('articles','category'));
    }

    public function article(Article $article){

        $comments = $article->comments()->get();
        return view('content.article',compact('article','comments'));
    }
}
