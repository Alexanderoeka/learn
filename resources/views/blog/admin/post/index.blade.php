@extends('layouts.app')
@section('content')
<nav class="navbar" >
    <a class="btn btn-primary" href="{{route('admin.blog.posts.create')}}">Create post</a>
</nav>
    <table class="list-group list-group-flush table bib table-hover "   style="{{--background-color:white--}}">
        <tr>
            <td>№</td>
            <td>Title</td>
            <td>Author</td>
            <td>Category</td>
            <td>Published at</td>
        </tr>
        @foreach ($postsList as $item)
        @php
          /**
           * @var \app\Models\BlogPost $item
           */
        @endphp
            <tr @if(!$item->is_published) style="background-color:#ccc;"@endif>
                <td>{{ $item->id }}</td>
                <td><a href="{{ route('admin.blog.posts.edit', $item->id) }}">{{ $item->title }}</a></td>
                <td>{{ $item->user->name }}</td>
                <td><a href="{{route('blog.admin.categories.edit',$item->category_id)}}">{{$item->category->title}}</a></td>
                <td>{{ $item->published_at ? \Carbon\Carbon::parse($item->published_at)->format('d.M H:i'):''}}</td>
            </tr>
        @endforeach

    </table>
    @if($postsList->total() > $postsList->count())
    {{ $postsList->links() }}
    @endif
@endsection
