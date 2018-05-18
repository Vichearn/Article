<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Article;
use File;
use Session;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('articles.index')->with('articles', $articles);
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
            if(Input::hasFile('image_file')){
                $file = Input::file('image_file');
                $file->move(public_path(). '/images', $file->getClientOriginalName());
                    $article->image_file = $file->getClientOriginalName();
                    $article->image_type = $file->getClientMimeType();
                    $article->image_size = $file->getClientSize();
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
            'descriptions'  => 'required',
            'image_file'    => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('articles/' . $id . '/edit')
                ->withErrors($validator);
        } else {
            $article = Article::find($id);
            $article->title         = Input::get('title');
            $article->descriptions  = Input::get('descriptions');
            if(Input::hasFile('image_file')){
                $file = Input::file('image_file');
                $file->move(public_path(). '/images', $file->getClientOriginalName());
                    $article->image_file = $file->getClientOriginalName();
                    $article->image_type = $file->getClientMimeType();
                    $article->image_size = $file->getClientSize();
            }
            $article->created_at  = Input::get('created_at');
            $article->updated_at  = Input::get('updated_at');
            $article->save();

            Session::flash('message', 'Successfully Created Article!');
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
