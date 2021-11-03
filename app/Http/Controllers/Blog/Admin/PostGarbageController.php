<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Repositories\BlogPostGarbageRepository;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

class PostGarbageController extends BaseController
{

    private $blogPostGarbageRepository;

    public function __construct()
    {

        $this->blogPostGarbageRepository = new BlogPostGarbageRepository();
    }

    public function index()
    {
        $listofTrash = $this->blogPostGarbageRepository->getTrashPaginate(10);
        return view('blog.admin.post.garbage.index', compact('listofTrash'));
    }
    public function delete($id)
    {
        $piece = $this->blogPostGarbageRepository->getOneTrash($id);

        $piece->forceDelete();
        return redirect()->route('admin.blog.posts.garbage');
    }
    public function restore($id)
    {

        $piece = $this->blogPostGarbageRepository->getOneTrash($id);

        $piece->restore();

        return back();
    }
}
