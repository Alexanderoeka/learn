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
                            <input name="title" value="" id="title" type="text" class="form-control" minlength="3"
                                required>
                        </div>
                        <div class="form-group">
                            <lable for="slug">Slug</lable>
                            <input name="slug" value="" id="slug" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <lable for="user_id">User</lable>
                            <select name="user_id" id="user_id" class="form-control" placeholder="choosen user"
                                required>
                                @foreach ($usersList as $userOption)
                                    <option value="{{ $userOption->id }}">
                                        {{ $userOption->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <lable for="category_id">Category</lable>
                            <select name="category_id" id="category_id" class="form-control"
                                placeholder="choosen category" required>
                                @foreach ($categoryList as $categoryOption)
                                    <option value="{{ $categoryOption->id }}">
                                        {{ $categoryOption->id_title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group" hidden>
                            <lable for="excerpt"> Content</lable>
                            <textarea name="excerpt" id="excerpt" class="form-control" rows="3">
                                {{ 'abobas' . rand(1, 8) }}
                        </textarea>
                        </div>
                        <div class="form-group">
                            <lable for="content_raw"> Content</lable>
                            <textarea name="content_raw" id="content_raw" class="form-control" rows="3">

                        </textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
