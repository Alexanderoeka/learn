<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Requests\BlogCategoryUpdateRequest;
use App\Http\Requests\BlogCategoryCreateRequest;
use App\Models\BlogPost;
use App\Repositories\BlogCategoryRepository;
use Illuminate\Support\Facades\DB;
use App\Repository;

use Illuminate\Support\Str;

class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $blogCategoryRepository;

    public function __construct()
    {
        parent::__construct();

        $this->blogCategoryRepository = app(BlogCategoryRepository::class);
    }
    public function index()
    {


        $paginator = $this->blogCategoryRepository->getAllWithpaginate(5);




        return view('blog.admin.category.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     * Страница параметров для создания новой категории
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryList = $this->blogCategoryRepository->getForComboBox();

        return view('blog.admin.category.create', compact('categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     * Создание новой категории
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogCategoryCreateRequest $request)
    {

        $data = $request->input();



        $item = new BlogCategory($data);

        $item->save();
        if ($item) {
            return redirect()->route('blog.admin.categories.edit', [$item->id])
                ->with(['success' => 'Save is success']);
        } else {
            return back()->withErrors(['msg' => 'Error of save'])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd(__METHOD__);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, BlogCategoryRepository $categoryRepository)
    {

        $item = $categoryRepository->getEdit($id);




        if (empty($item)) {
            abort(404);
        }
        $categoryList = $categoryRepository->getForComboBox();

        return view('blog.admin.category.edit', compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogCategoryUpdateRequest $request, $id)
    {







        $item = $this->blogCategoryRepository->getEdit($id);

        if (empty($item)) {
            return back()
                ->withErrors(['msg' => "Message id=[{$id}] didn't find", 'mmm' => 'VOT eto da'])
                ->withInput();
        }

        $data = $request->all();

        $result = $item->fill($data)->save();

        if ($result) {
            return redirect()->route('blog.admin.categories.edit', $item->id)
                ->with(['success' => 'Save is success']);
        } else {
            return back()
                ->withErrors(['msg' => 'Error of save'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd(__METHOD__);
    }
}
