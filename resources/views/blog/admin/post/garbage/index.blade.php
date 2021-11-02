@extends('layouts.app')

@section('content')

    <table class="list-group list-group-flush table bib table-hover "   style="{{--background-color:white--}}">
        <tr>
            <td>№</td>
            <td>Title</td>
            <td>Author</td>
            <td>Category</td>
            <td>Published at</td>
            <td>Deleted_at</td>
        </tr>
        @foreach ($listofTrash as $item)
        @php
          /**
           * @var \app\Models\BlogPost $item
           */
        @endphp
            <tr @if(!$item->is_published) style="background-color:#ccc;"@endif>
                <td>{{ $item->id }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->user->name }}</td>
                <td><a href="{{route('blog.admin.categories.edit',$item->category_id)}}">{{$item->category->title}}</a></td>
                <td>{{ $item->published_at ? \Carbon\Carbon::parse($item->published_at)->format('d.M H:i'):''}}</td>
                <td>{{$item->deleted_at ? \Carbon\Carbon::parse($item->deleted_at)->format('d.M H:i'):''}}</td>
                <td><a class="btn btn-primary" href="{{route('admin.blog.posts.garbage.restore',$item->id)}}"> Restore</a></td>
            </tr>
        @endforeach

    </table>
    @if($listofTrash->total() > $listofTrash->count())
    {{ $listofTrash->links() }}
    @endif

@endsection
