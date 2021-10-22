@extends('layouts.app')

@section('content')

    <form method="POST" action="{{ route('admin.blog.posts.update', $item->id) }}">
        @method('PATCH')
        @csrf

        @if ($errors->any()){{ session()->get('errors')->first() }}  @endif
        @if (session('success')){{ session('success') }} @endif
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('blog.admin.post.includes.item_edit_main_col')
                </div>
                <div class="col-md-3">
                    @include('blog.admin.post.includes.item_edit_add_col')
                </div>
            </div>
        </div>

        <input type="submit" value="Save" class="btn btn-primary">
    </form>


@endsection
