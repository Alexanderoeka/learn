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
    public function delete()
    {
        dd(__METHOD__);
    }
    public function restore($id)
    {

        $piece = $this->blogPostGarbageRepository->getOneTrash($id);

        $piece->restore();

        return back();
    }
}
