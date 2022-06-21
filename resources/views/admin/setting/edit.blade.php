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
                            <form action="{{ route('admin.setting.update',$setting) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form theme-form">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label>Image</label>
                                                <input class="form-control" type="file" name="logo" onchange="mainThumbURL(this)">
                                                @error('image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <img class="mt-3" src="" id="mainThumb">
                                            <div class="mb-3">
                                                <label>Current Image</label>
                                                <img src="{{ asset($setting->logo) }}" alt="" style="width: 100px">
                                            </div>  
                                            <div class="mb-3">
                                                <label>Footer</label>
                                                <textarea name="footer"  class="form-control" cols="3" rows="3">{{ $setting->footer }}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label>About</label>
                                                <textarea name="about" class="form-control"  cols="3" rows="3">{{ $setting->about }}</textarea>
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

