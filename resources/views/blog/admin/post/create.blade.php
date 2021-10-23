@extends('layouts.app')

@section('content')

    <form method='POST' action="{{ route('admin.blog.posts.store') }}">
        @csrf

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('blog.admin.post.includes.create_main_col')
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </div><br />
            </div>

        </div>




    </form>



@endsection
