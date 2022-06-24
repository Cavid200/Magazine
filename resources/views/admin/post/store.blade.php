@extends('admin.admin_master')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>{{ __('post create') }}</h3>
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
                            <form action="{{ route('admin.post.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form theme-form">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label>{{ __('title') }}</label>
                                                <input class="form-control" type="text" name="title"
                                                    placeholder="Title*" required>
                                                @error('title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label>{{ __('short description') }}</label>
                                                <input class="form-control" type="text" name="short_description"
                                                    placeholder="Short description *" required>
                                            </div>
                                            <div class="mb-3">
                                                <label>{{ __('description') }}</label>
                                                <textarea name="description"  cols="3" rows="3" required class="form-control" placeholder="Description *"></textarea>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label>{{ __('image') }}</label>
                                            <input class="form-control" type="file" name="image">
                                        </div>
                                        <div class="mb-3">
                                            <label>{{ __('tags') }}</label>
                                            <select name="tags[]"  multiple id="choices-multiple-remove-button">
                                                @foreach ($tags as $tag)
                                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                @endforeach
                                                @error('tags')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label>{{ __('categories') }}</label>
                                            <select name="categories[]"  multiple id="choices-multiple-remove-button">
                                                @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                                @error('categories')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label> {{ __('publish time') }}</label>
                                            <input type="datetime-local" name="publish_time" class="form-control" placeholder="Publish time *">
                                        </div>
                                        <div class="mb-3">
                                            <label>{{ __('status') }}</label>
                                            <input type="checkbox" name="isActive" style="width: 20px; height:20px">
                                        </div>
                                        <div class="mb-3">
                                            <label>{{ __('editor') }}</label>
                                            <input type="checkbox" name="isEditor" style="width: 20px; height:20px">
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn-success">{{ __('create') }}</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
    </div>
@endsection
