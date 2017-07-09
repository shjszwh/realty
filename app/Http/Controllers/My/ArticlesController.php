<?php

namespace App\Http\Controllers\My;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\DirContent;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Article $articleModel, Request $request)
    {
        $user = \Auth::user();
        $articles = $user->articles()->orderBy('id', 'desc')->paginate(30);
        $items = [];

        foreach ($articles as $article) {
            $arrayArticle = $article->toArray();
            $arrayArticle['tags'] = $article->tags->toArray();
            $arrayArticle['dirs'] = [];
            $arrayArticle['showUrl'] = route('my-articles.show', $article->id);
            $arrayArticle['editUrl'] = route('my-articles.edit', $article->id);
            if (count($article->dirs)) {
                foreach ($article->dirs as $dir) {
                    $arrayArticle['dirs'][] = $dir->dir;
                }
            }
            $items[] = $arrayArticle;
        }
//		dd($articles);
        return view('my.articles.index', ['articles' => $articles->toJSON(), 'items' => json_encode($items, true)]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('my.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $all = $request->all();
        $status = false;
        DB::transaction(function ($data) use ($all, &$status) {
            $user = \Auth::user();
            $article = Article::create(['user_id' => $user->id, 'title' => $all['title']]);
            $tags = [];
            foreach ($all['tags'] as $tag) {
                $tags[] = new Tag([
                    'user_id' => $user->id,
                    'title' => $tag,
                ]);
            }
//			$dirs = [];
//			foreach ($all['dirs'] as $dir) {
//				$dirs[] = new DirContent(['dir_id' => $dir]);
//			}
//			$article->dirs()->saveMany($dirs);
            $article->tags()->saveMany($tags);
            $article->content()->create(['content' => $all['content']]);
            $status = true;
        });
        if ($status) {
            return response(['message' => '提交成功', 'status' => 'success'], Response::HTTP_OK);
        } else {
            return response(['message' => '保存失败', 'status' => 'success'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article,$id)
    {
        $article = $article->find($id);
        $articleJson = $article->toJSON();
        $tags = $article->tags->toJSON();
        $author = $article->user->toJSON();
        $content = $article->content->content;

        return view('my.articles.show',
            ['article' => $articleJson, 'tags' => $tags, 'author' => $author, 'content' => $content]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('my.articles.edit');
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
