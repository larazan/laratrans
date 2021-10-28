<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Article;
use App\Models\CategoryArticle;
use App\Models\Tag;
use App\Models\ArticleImage;

use Intervention\Image\ImageManagerStatic as InterventionImage;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.articles.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $articles = Article::orderBy('name', 'desc')->get();

        $this->data['articles'] = $articles->toArray();
        $this->data['article'] = null;

        return view('admin.articles.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $params = $request->except('_token');
        $params['slug'] =  Str::slug($params['title']);
        $params['user_id'] = $request->user()->id;
        $params['article_type'] = Article::POST;

        if ($params['status'] == Article::ACTIVE) {
            $params['published_at'] = now();
        }

        $tags = explode(',', $params['tags_input']);
        $tagIds = [];
        foreach ($tags as $tag) {
            $itemTag = Tag::where('name', trim($tag))->first();

            if (!$itemTag) {
                $itemTag = Tag::create(['name' => trim($tag), 'slug' => Str::slug(trim($tag))]);
            }

            $tagIds[] = $itemTag->id;
        }

        // $article = Article::create($params);
        if (Article::create($params)) {
			Session::flash('success', 'Article has been created');
		} else {
			Session::flash('error', 'Article could not be created');
		}
        $article->categories()->attach($params['category_article_ids']);
        $article->tags()->attach($tagIds);

        if ($request->file('image')) {
            $image = $request->file('image');
            $fileName = $image->getClientOriginalName();
            $folder = ArticleImage::UPLOAD_FOLDER;

            $path = $image->storeAs($folder, $fileName, 'public');

            if ($path) {
                $resizedImages = $this->resizeImage($image, $fileName, $folder);
                
                $imagesPath = array_merge([
                    'original' => $path,
                ], $resizedImages);

                $article->images()->create($imagesPath);
            }
        }

        return redirect('admin/articles');
    }

    private function resizeImage($image, $fileName, $folder) {
        $resizedImage = [];

        $smallImageFilePath = $folder . '/small/' . $fileName;
        $size = explode('x', ArticleImage::SMALL);
        list($width, $height) = $size;
        $smallImageFile = InterventionImage::make($image)->fit($width, $height)->stream();
        if (\Storage::put('public/' . $smallImageFilePath, $smallImageFile)) {
            $resizedImage['small'] = $smallImageFilePath;
        }
        
        $mediumImageFilePath = $folder . '/medium/' . $fileName;
        $size = explode('x', ArticleImage::MEDIUM);
        list($width, $height) = $size;
        $mediumImageFile = InterventionImage::make($image)->fit($width, $height)->stream();
        if (\Storage::put('public/' . $mediumImageFilePath, $mediumImageFile)) {
            $resizedImage['medium'] = $mediumImageFilePath;
        }

        $largeImageFilePath = $folder . '/large/' . $fileName;
        $size = explode('x', ArticleImage::LARGE);
        list($width, $height) = $size;
        $largeImageFile = InterventionImage::make($image)->fit($width, $height)->stream();
        if (\Storage::put('public/' . $largeImageFilePath, $largeImageFile)) {
            $resizedImage['large'] = $largeImageFilePath;
        }

        return $resizedImage;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = CategoryArticle::orderBy('name', 'asc')->get();

        $this->data['article'] = $article;
        $this->data['categories'] = $categories;

        return view('admin.articles.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
        $article = Article::findOrFail($id);

        $params = $request->except('_token');
        $params['slug'] = Str::slug($params['title']);

        $tags = explode(',', $params['tags_input']);
        $tagIds = [];
        foreach ($tags as $tag) {
            $itemTag = Tag::where('name', trim($tag))->first();

            if (!$itemTag) {
                $itemTag = Tag::create(['name' => trim($tag), 'slug' => Str::slug(trim($tag))]);
            }

            $tagIds[] = $itemTag->id;
        }

        
        if ($article->update($params)) {
            Session::flash('success', 'Article has been updated.');
        }
        $article->categories()->sync($params['category_article_ids']);
        $article->tags()->sync($tagIds);

        if ($request->file('image')) {
            $image = $request->file('image');
            $fileName = $image->getClientOriginalName();
            $folder = ArticleImage::UPLOAD_FOLDER;

            $path = $image->storeAs($folder, $fileName, 'public');

            if ($path) {
                $article->images()->delete();

                $resizedImages = $this->resizeImage($image, $fileName, $folder);
                
                $imagesPath = array_merge([
                    'original' => $path,
                ], $resizedImages);

                $article->images()->create($imagesPath);
            }
        }

        return redirect('admin/articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);

        $article->categories()->detach($article->category_article_ids);
        $article->tags()->detach($article->tag_ids);
        if($article->delete()) {
            Session::flash('success', 'Article has been deleted');
        }

        return redirect('admin/articles');
    }
}
