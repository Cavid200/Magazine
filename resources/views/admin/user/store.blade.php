@extends('admin.admin_master')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>{{ __('user create') }}</h3>
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
                            <form action="{{ route('admin.user.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form theme-form">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label>{{ __('firstname') }}</label>
                                                <input class="form-control" type="text" name="firstname"
                                                    placeholder="{{ __('firstname') }} *" required>
                                                @error('firstname')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label>{{ __('lastname') }}</label>
                                                <input class="form-control" type="text" name="lastname"
                                                    placeholder="{{ __('lastname') }} *" required>
                                            </div>
                                            <div class="mb-3">
                                                <label>{{ __('image') }}</label>
                                                <input class="form-control" type="file" name="image">
                                            </div>
                                            <div class="mb-3">
                                                <label>{{ __('about') }}</label> 
                                                <textarea name="about" class="form-control" cols="30" rows="5" placeholder="{{ __('about') }}*"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label>{{ __('email') }}</label>
                                                <input class="form-control" type="email" name="email"
                                                    placeholder="{{ __('email') }} *" required>
                                            </div>
                                            <div class="mb-3">
                                                <label>{{ __('password') }}</label>
                                                <input class="form-control" type="password" name="password"
                                                    placeholder="{{ __('password') }} *" required>
                                            </div>
                                            <div class="mb-3">
                                                <label>{{ __('confirm password') }}</label>
                                                <input class="form-control" type="password" name="confirm_password"
                                                    placeholder="{{ __('confirm password') }} *" required>
                                            </div>
                                            <div class="mb-3">
                                                <label>{{ __('role') }}</label>
                                                <select name="role_id" class="form-control" required>
                                                    @foreach ($roles as $role)
                                                    <option  value="{{ $role->id }}">{{ $role->name }}</option> 
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label>{{ __('status') }}</label>
                                                <input type="checkbox" name="isActive" style="width: 20px; height:20px">
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
