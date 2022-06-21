@extends('admin.admin_master')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>{{ __('user list') }}</h3>
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
                            <form action="{{ route('admin.user.update',$user) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form theme-form">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label>{{ __('firstname') }}</label>
                                                <input class="form-control" type="text" name="firstname"
                                                    placeholder="{{ __('firstname') }} *" required value="{{ $user->firstname }}">
                                                @error('firstname')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label>{{ __('lastname') }}</label>
                                                <input class="form-control" type="text" name="lastname"
                                                    placeholder="{{ __('lastname') }} *" required value="{{ $user->lastname }}">
                                                    @error('lastname')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label>{{ __('image') }}</label>
                                                <input class="form-control" type="file" name="image" onchange="mainThumbURL(this)">
                                                @error('image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <img class="mt-3" src="" id="mainThumb">
                                            <div class="mb-3">
                                                <label>{{ __('current image') }}</label>
                                                <img src="{{ asset($user->image) }}" alt="" style="width: 100px">
                                            </div>
                                            <div class="mb-3">
                                                <label>{{ __('about') }}</label>
                                                <textarea name="about" class="form-control" cols="30" rows="5" placeholder="{{ __('about') }}*">{{ $user->about }}</textarea>
                                                @error('about')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label>{{ __('email') }}</label>
                                                <input class="form-control" type="email" name="email"
                                                    placeholder="{{ __('email') }} *" required value="{{ $user->email }}">
                                                    @error('email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label>{{ __('password') }}</label>
                                                <input class="form-control" type="password" name="password"
                                                    placeholder="{{ ('password') }} *">
                                                    @error('password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label>{{ __('confirm password') }}</label>
                                                <input class="form-control" type="password" name="confirm_password"
                                                    placeholder="{{ __('confirm password') }} *">
                                                    @error('confirm_password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label>{{ __('role') }}</label>
                                                <select name="role_id" class="form-control" required>
                                                    @foreach ($roles as $role)
                                                        <option {{ $role->id == $user->role_id ? 'selected' : '' }}
                                                            value="{{ $role->id }}">{{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('role_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label>{{ __('status') }}</label>
                                                <input @checked($user->isActive) type="checkbox" name="isActive"
                                                    style="width: 20px; height:20px">
                                                    @error('isActive')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
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

