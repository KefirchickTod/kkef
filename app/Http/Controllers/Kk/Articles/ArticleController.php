<?php

namespace App\Http\Controllers\Kk\Articles;


use App\Http\Controllers\Kk\BasicController;
use App\Http\Requests\Kk\ArticleCreateRequest;
use App\Models\Kk\Article;
use App\Repositories\Kk\Article\ArticleCategoriesRepository;
use App\Repositories\Kk\Article\ArticleRepository;
use Illuminate\Http\Request;

class ArticleController extends BasicController
{


    /**
     * @var ArticleRepository
     */
    private $articleRepository;

    public function __construct()
    {
        parent::__construct();
        $this->articleRepository = app(ArticleRepository::class);
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $paginate = $this->articleRepository->getAllWithPaginate();

        return view('kk.article.index', compact('paginate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categoryList = app(ArticleCategoriesRepository::class)->getForComBox();
        return view('kk.article.create', compact('categoryList'));
    }


    /**
     * @param ArticleCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ArticleCreateRequest $request)
    {

        $data = $request->input();

        $item = (new Article())->create($data);
        if($item){
            return redirect()
                ->route('kk.article.edit', $item->id)->with(['success' => 'Success created']);
        }
        return back()
            ->withInput()
            ->withErrors(['msg' => 'Error of created']);
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
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $item = $this->articleRepository->getEdit($id);
        $categoryList = app(ArticleCategoriesRepository::class)->getForComBox();

        return view('kk.article.edit', compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
