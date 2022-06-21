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
                            <form>
                                <div class="form theme-form">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label>Name</label>
                                                <input class="form-control" type="text" disabled
                                                    value="{{ $contact_us->name }}">
                                            </div>
                                            <div class="mb-3">
                                                <label>E-mail</label>
                                                <input class="form-control" type="text" disabled
                                                    value="{{ $contact_us->email }}">
                                            </div>
                                            <div class="mb-3">
                                                <label>Phone</label>
                                                <input class="form-control" type="text" disabled
                                                    value="{{ $contact_us->phone }}">
                                            </div>
                                            <div class="mb-3">
                                                <label>Subject</label>
                                                <input class="form-control" type="text" disabled
                                                    value="{{ $contact_us->subject }}">
                                            </div>
                                            <div class="mb-3">
                                                <label>Message</label>
                                                <textarea class="form-control" cols="30" rows="5" disabled>{{ $contact_us->message }}</textarea>
                                            </div>
                                        </div>
                                    </div>
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
