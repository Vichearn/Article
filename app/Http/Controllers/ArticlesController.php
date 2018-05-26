<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Article;
use Image;
use Storage;
use File;
use Session;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $articles = Article::paginate(3);
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $rules = array(
            'title'         => 'required',
            'descriptions'  => 'required',
            'image_file'    => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('articles/create')
                ->withErrors($validator);
        } else {
            $article = new Article();
            $article->title         = Input::get('title');
            $article->descriptions  = Input::get('descriptions');
            if($request->hasFile('image_file')){
                $image = $request->file('image_file');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/' . $filename);
                Image::make($image)->resize(100, 100)->save($location);

                $article->image_file = $filename;
                $article->image_type = $image->getClientMimeType();
                $article->image_size = $image->getClientSize();
            }
            $article->created_at  = Input::get('created_at');
            $article->updated_at  = Input::get('updated_at');
            $article->save();

            Session::flash('message', 'Successfully Created Article!');
            return Redirect::to('articles');
        }
    }

    public function show($id)
    {
        $article = Article::find($id);
        return View::make('articles.show')->with('article', $article);
    }

    public function edit($id)
    {
        $article = Article::find($id);
        return View::make('articles.edit')->with('article', $article);
    }

    public function update(Request $request, $id)
    {
        $rules = array(
            'title'         => 'required',
            'descriptions'  => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('articles/' . $id . '/edit')
                ->withErrors($validator);
        } else {
            $article = Article::findOrfail($id);
            $article->title         = Input::get('title');
            $article->descriptions  = Input::get('descriptions');
            if($request->hasFile('image_file')){
                $image = $request->file('image_file');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/' . $filename);
                Image::make($image)->resize(100, 100)->save($location);
                File::delete('images/' . $article->image_file);

                $article->image_file = $filename;
                $article->image_type = $image->getClientMimeType();
                $article->image_size = $image->getClientSize();
            }
            $article->created_at  = $article->created_at;
            $article->updated_at  = Input::get('updated_at');
            $article->save();

            Session::flash('message', 'Successfully Updated Article!');
            return Redirect::to('articles');
        }
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        File::delete('images/' . $article->image_file);
        $article->delete();

        Session::flash('message', 'Successfully deleted the Article!');
        return Redirect::to('articles');
    }
}
