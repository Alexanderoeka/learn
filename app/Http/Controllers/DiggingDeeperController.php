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
            // ->values();
            ->keyBy('id');
            $result['where']['haaa'] = $result['where']['data']->merge(collect(['dd','adfsaf','sdggghaf',234,'adf'=>['eqwrg',112,'eagetrh']]));

        $result['where']['count']  = $result['where']['haaa']->count();
       // $collection->transform();

        $bol1= null;
        $bol2 = 'one';
        dd(is_null($bol1),is_null($bol2));
        dd($result['where']);


    }
}
