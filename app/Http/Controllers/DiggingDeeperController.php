<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DiggingDeeperController extends Controller
{


    public function collections()
    {
        $result = [];
        $eloquentCollection = BlogPost::withTrashed()->get();
        $collOne = BlogPost::withTrashed()->where('id', 50)->get();
        $collTwo = BlogPost::withTrashed()->where('id', 104)->get();
        $chto = $collTwo[0];
        $chto->title = 'AHAHAHAHH_NUNET_Blet';
        $chto->delete();
        //dd($chto);
        //dd(__METHOD__, $eloquentCollection, $eloquentCollection->toArray(),$collOne,$collTwo);


        $collection = collect($eloquentCollection->toArray());


        /*dd(__METHOD__,
            get_class($eloquentCollection),
            get_class($collection),
            $eloquentCollection,
            $collection
        );
        */

        //dd($collection);

        $result['where']['data'] = $collection
            ->where('category_id', 3)
            ->where('deleted_at', '!=', null)
            ->values()
            ->keyBy('id');
        dd($result);
    }
}
