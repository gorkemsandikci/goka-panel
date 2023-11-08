<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WorldNewsController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('panel.pages.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $articles = Article::get();
        return view('panel.pages.article.edit', compact('articles'));
    }

    public function store(ArticleRequest $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = $request->title;
            $destination_path = 'img/articles';
            $image_url = image_upload($image, $image_name, $destination_path, rand(99, 9999));
        }

        Article::create([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'description' => $request->description,
            'monotag' => Str::upper($request->monotag),
            'ditag' => Str::upper($request->ditag),
            'tritag' => Str::upper($request->tritag),
            'slug' => Str::lower($request->slug),
            'image' => $image_url ?? null,
            'category_id' => 1,
            'full_text' => $request->full_text,
            'status' => 1
        ]);

        return back()->withSuccess('Makale oluşturuldu!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleRequest $request, string $id)
    {
        $article = Article::where('id', $id)->firstOrFail();
        $image_url = $article->image;

        if ($request->hasFile('image')) {
            delete_file($article->image);
            $image = $request->file('image');
            $image_name = $request->name;
            $destination_path = 'img/articles';
            $image_url = image_upload($image, $image_name, $destination_path, $id);
        }

        $article->update([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'description' => $request->description,
            'monotag' => $request->monotag,
            'ditag' => $request->ditag,
            'tritag' => $request->tritag,
            'slug' => $request->slug,
            'image' => $image_url,
            'category_id' => 1,
            'full_text' => $request->full_text,
            'status' => 1
        ]);

        return back()->withSuccess('Makale güncellendi!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::where('id', $id)->first();

        return view('panel.pages.article.edit', compact('article'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $article = Article::where('id', $request->id)->firstOrFail();

        delete_file($article->image);

        $article->delete();

        return response(['error' => false, 'message' => 'Başarıyla Silindi.']);
    }

    public function statusUpdate(Request $request)
    {
        $update = $request->state;

        dd($request->id);
        $update_check = $update === 'true' ? 1 : 0;

        Article::where('id', $request->id)->update(['status' => $update_check]);
        return response(['error' => false, 'status' => $update]);
    }

}
