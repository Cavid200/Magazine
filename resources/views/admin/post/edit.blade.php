@extends('admin.admin_master')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Role Create</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Apps</li>
                            <li class="breadcrumb-item active">Role Create </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.post.update', $post) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form theme-form">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label>{{ __('title') }}</label>
                                                <textarea name="title" id="" cols="30" rows="10" required>{{ $post->title }}</textarea>
                                                @error('title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label>{{ __('short description') }}</label>
                                                <input class="form-control" type="text" name="short_description"
                                                    placeholder="Short description *"
                                                    value="{{ $post->short_description }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label>{{ __('description') }}</label>
                                                <textarea name="description" cols="3" rows="3" required class="form-control"
                                                    placeholder="Description *">{{ $post->description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label>{{ __('image') }}</label>
                                            <input class="form-control" type="file" name="image"
                                                onchange="mainThumbURL(this)">
                                            @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <img class="mt-3" src="" id="mainThumb">
                                        <div class="mb-3">
                                            <label>{{ __('current image') }}</label>
                                            <img src="{{ asset($post->image) }}" alt="" style="width: 100px">
                                        </div>
                                        <div class="mb-3">
                                            <label>Tag</label>
                                            <select name="tags[]" multiple id="choices-multiple-remove-button">
                                                @foreach ($tags as $tag)
                                                    <option
                                                        {{ $tag->id == in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'selected' : '' }}
                                                        value="{{ $tag->id }}">{{ $tag->name }}
                                                    </option>
                                                @endforeach
                                                @error('tags')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label>Categories</label>
                                            <select name="categories[]" multiple id="choices-multiple-remove-button">
                                                @foreach ($categories as $category)
                                                    <option
                                                        {{ $category->id == in_array($category->id, $post->categories->pluck('id')->toArray()) ? 'selected' : '' }}
                                                        value="{{ $category->id }}">{{ $category->name }}
                                                    </option>
                                                @endforeach
                                                @error('categories')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label>{{ __('publish time') }}</label>
                                            <input type="datetime-local" name="publish_time"
                                                value="{{ date('Y-m-d\TH:i', strtotime($post->publish_time)) }}"
                                                class="form-control" placeholder="Publish time *">
                                        </div>
                                        <div class="mb-3">
                                            <label>{{ __('status') }}</label>
                                            <input type="checkbox" name="isActive" style="width: 20px; height:20px"
                                                @checked($post->isActive)>
                                        </div>
                                        <div class="mb-3">
                                            <label>{{ __('editor') }}</label>
                                            <input type="checkbox" name="isEditor" style="width: 20px; height:20px"
                                                @checked($post->isEditor)>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn-success">{{ __('update') }}</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');
</script>
@endsection