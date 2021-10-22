<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title"></div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#maindata" role="tab">Main data</a>
                    </li>
                </ul>
                <br />
                <div class="tab-content">
                    <div class="tab-pane active" id="maindata" role="tabpanel">
                        <div class="form-group">
                            <lable for="title">Title</lable>
                            <input name="title" value="{{ $item->title }}" id="title" type="text"
                                class="form-control" minlength="3" required>
                        </div>
                        <div class="form-group">
                            <lable for="slug">Slug</lable>
                            <input name="slug" value="{{ $item->slug }}" id="slug" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <lable for="user">User</lable>
                            <input name="user" value="{{ $item->user_id }}" id="slug" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <lable for="parent_id">Category</lable>
                            <select name="parent_id" id="parent_id" class="form-control"
                                placeholder="choosen category" required>
                                @foreach ($categoryList as $categoryOption)
                                    <option value="{{ $categoryOption->id }}" @if ($categoryOption->id == $item->category_id) selected @endif>
                                        {{ $categoryOption->id_title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <lable for="description">Content</lable>
                            <textarea name="description" id="description" class="form-control" rows="3">
                            {{ old('description', $item->content_raw) }}
                        </textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
