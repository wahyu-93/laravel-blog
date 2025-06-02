<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleEditRequest;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()){
            $articles = Article::with('Category')->latest()->get();
            return DataTables::of($articles)
                ->addIndexColumn()
                ->addColumn('category_id', function($articles){
                    return $articles->Category->name;
                })
                ->addColumn('status', function($articles){
                    if($articles->status == 0){
                        return '<span class="badge bg-danger">Private</span>';
                    }
                    else {
                         return '<span class="badge bg-success">Published</span>';
                    }
                })
                ->addColumn('button', function($articles){
                    return '<div class="text-center">
                                <a class="btn btn-sm btn-secondary" href="'.route('articles.show', $articles).'">Detail</a>
                                <a class="btn btn-sm btn-success" href="'.route('articles.edit', $articles).'">Edit</a>
                                <form action="'.route('articles.destroy', $articles).'" method="POST" style="display:inline-block;" >
                                    '.csrf_field().method_field('DELETE').'
                                    <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                                </form>
                            </div>';
                })
                ->rawColumns(['category_id','status','button'])
                ->make();
        };
        return view('back.article.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('back.article.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        $article = $request->validated();

        // managemen file
        $img = $request->file('img');
        $imgName = uniqid() .    '.' . $img->getClientOriginalExtension();
        // simpan file foto ke storage
        $img->storeAs('public/back/article/' . $imgName);

        $article['img'] = $imgName;
        $article['slug'] = Str::slug($request->title);
        
        Article::create($article);

        return redirect()->route('articles.index')->with('success', 'Article Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('back.article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $categories = Category::get();
        return view('back.article.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleEditRequest $request, Article $article)
    {
        $data = $request->all();
        
        // jika foto baru
        if($request->hasFile('img')){
            $img = $request->file('img');
            $imgName = uniqid() .    '.' . $img->getClientOriginalExtension();
    
            // simpan file foto ke storage
            $img->storeAs('public/back/article/' . $imgName);

            $data['img'] = $imgName;
            $data['slug'] = Str::slug($request->title);

            // hapus foto terdahulu
            Storage::delete('public/back/article/' . $request->oldImg);
        }

        $article->update($data);
        return redirect()->route('articles.index')->with('success', 'Article Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        Storage::delete('public/back/article/' . $article->img);
        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Article Berhasil Dihapus');
    }
}
