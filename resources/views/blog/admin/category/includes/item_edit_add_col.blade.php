<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div><br />
@if ($item->exists)
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li>ID:{{ $item->id }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <br />
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <lable for="title">Created</lable>
                        <input value="{{ $item->created_at }}" calss="form-control" disabled />
                    </div>
                    <div class="form-group">
                        <lable for="title">Changed</lable>
                        <input type="text" value="{{ $item->updated_at }}" class="form-control" disabled />
                    </div>
                    <div class="form-group">
                        <lable for="title">Deleted</lable>
                        <input type="text" value="{{ $item->deleted_at }}" class="form-control" disabled />

                    </div>
                </div>
            </div>
        </div>
    </div><br/>
@endif