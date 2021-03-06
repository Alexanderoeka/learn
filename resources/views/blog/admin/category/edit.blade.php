@extends('layouts.app')


@section('content')
    @php
    /** @var \App\Models\BlogCategory $item */
    @endphp

    <form method="POST" action="{{ route('blog.admin.categories.update', $item->id) }}">
        @method('PATCH')
        @csrf

        @if ($errors->any()){{ session()->get('errors')->first()}}  @endif
        @if (session('success')){{ session('success') }} @endif
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('blog.admin.category.includes.item_edit_main_col')
                </div>
                <div class="col-md-3">
                    @include('blog.admin.category.includes.item_edit_add_col')
                </div>
            </div>
        </div>
    </form>

@endsection
