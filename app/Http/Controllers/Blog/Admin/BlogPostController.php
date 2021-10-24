<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Requests\BlogPostCreateRequest;
use App\Models\BlogPost;
use App\Repositories\BlogCategoryRepository;
use App\Repositories\BlogPostRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Requests\BlogPostUpdateRequest;

class BlogPostController extends BaseController
{
    private $blogPostRepository;

    private $blogCategoryRepository;

    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->blogPostRepository = app(BlogPostRepository::class);
        $this->blogCategoryRepository = app(BlogCategoryRepository::class);
        $this->userRepository = app(UserRepository::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $postsList = $this->blogPostRepository->getPaginateForList(10);

        return view('blog.admin.post.index', compact('postsList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryList = $this->blogCategoryRepository->getForComboBox();
        $usersList = $this->userRepository->getAllUsers();


        return view('blog.admin.post.create', compact('categoryList', 'usersList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogPostCreateRequest $request)
    {
        $data = $request->all();
        //$data['excerpt'] = 'Abobas' . rand(1,8);
        unset($data['_token']);
        //dd($data);
        $data['content_html'] = $data['content_raw'];
        $_SESSION['old']['title'] = 'Uhaha';
        return back()
            ->withErrors(['ss' => 'sosi hui']);
        //dd($data);
        $item = new BlogPost($data);


        $result = $item->save();


        if ($result) {
            return redirect(route('admin.blog.posts.edit', $item->id))
                ->with(['success' => 'all is success'])
                ->withInput();
        } else {
            return back()->withErrors(['msg' => 'Nu ti i eblan'])
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
        $item = $this->blogPostRepository->getforEdit($id);
        if (empty($item)) {
            abort(404);
        }
        $categoryList = $this->blogCategoryRepository->getForComboBox();

        return view('blog.admin.post.edit', compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogPostUpdateRequest $request, $id)
    {

        $data = $request->all();
        if (!empty($data['is_published'])) {
            $data['is_published'] = 1;
        } else {
            $data['is_published'] = 0;
        }


        $mod =  $this->blogPostRepository->getEdit($id);
        if (empty($mod)) {

            return back()
                ->withErrors(['msg' => "Message id=[{$id}] didn't find", 'mmm' => 'VOT eto da'])
                ->withInput();
        }

        $uf = $mod->fill($data)->save();
        if ($uf) {
            return redirect(route('admin.blog.posts.edit', $id))
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

        $post = $this->blogPostRepository->getforEdit($id);
        //dd($post);
        $post->delete();
        return redirect('admin/blog/posts');
    }
}
