@extends('admin.admin_master')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>{{ __('social_media update') }}</h3>
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
                            <form action="{{ route('admin.social_media.update', $social_media) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form theme-form">
                                    <div class="row">
                                        <div class="mb-3">
                                            <label>{{ __('name') }}</label>
                                            <input class="form-control" type="text" name="name" value="{{ $social_media->name }}" placeholder="Name *"
                                                required>
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label>Url</label>
                                            <input class="form-control" type="text" name="url" value="{{ $social_media->url }}" placeholder="Url *"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label>{{ __('icon') }}</label>
                                            <input class="form-control" type="text" name="icon" value="{{ $social_media->icon }}" placeholder="Icon *"
                                                required>
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
