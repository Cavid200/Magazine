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
                            <form action="{{ route('admin.contact.update', $contact) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form theme-form">
                                    <div class="row">
                                        <div class="mb-3">
                                            <label>Phone</label>
                                            <input class="form-control" type="text" value="{{ $contact->phone }}" name="phone"
                                                placeholder="Phone *" required>
                                            @error('phone')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label>Email</label>
                                            <input class="form-control" type="email" value="{{ $contact->email }}" name="email"
                                                placeholder="Email *" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Map</label>
                                            <input class="form-control" type="text" value="{{ $contact->map }}" name="map"
                                                placeholder="Map *" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Address</label>
                                           <textarea name="address"  class="form-control"  placeholder="Address *"  cols="3" rows="3" required> {{ $contact->address }}</textarea>
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
