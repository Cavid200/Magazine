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
                            <form action="{{ route('admin.category.update', $category) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form theme-form">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <div class="mb-3">
                                                    <label>Name</label>
                                                    <input class="form-control" type="text" name="name" enctype="multipart/form-data"
                                                        placeholder="Name *" value="{{ $category->name }}" required>
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
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
                                                    <img src="{{ asset($category->image) }}" alt="" style="width: 100px">
                                                </div>
                                                <div class="mb-3">
                                                    <label>Status</label>
                                                    <input type="checkbox" name="isActive" style="width: 20px; height:20px"
                                                        @checked($category->isActive)>
                                                </div>
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
        <!-- Container-fluid Ends-->
    </div>
@endsection
