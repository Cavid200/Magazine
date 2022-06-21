@extends('admin.admin_master')

@section('content')
@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
@endsection
<!-- Page Body Start-->
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Product list</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <!-- Individual column searching (text inputs) Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive product-table">
                            <table class="display" id="contact_us">
                                <thead>
                                    <tr>
                                        <th>Row</th>
                                        <th>Fullname</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($comments as $comment)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $comment->fullname }}</td>
                                            <td>{{ $comment->created_at->diffForHumans() }}</td>
                                            <td>
                                                <a href="{{ route('admin.comment.show', $comment) }}"
                                                    class="btn btn-info">show</a>
                                                @if ($comment->isActive == 1)
                                                    <a href="{{ route('admin.comment.destroy', $comment) }}"
                                                        class="btn btn-danger delete">{{ __('delete') }}</a>
                                                @else
                                                    <a href="{{ route('admin.comment.active', $comment) }}"
                                                        class="btn btn-warning">{{ __('activate') }}</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Individual column searching (text inputs) Ends-->
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>
@endsection


@section('js')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        $('#contact_us').DataTable({
            language: {
                @if (app()->getLocale() === 'az')
                    url: '//cdn.datatables.net/plug-ins/1.11.3/i18n/az_az.json'
                @elseif(app()->getLocale() === 'ru')
                    url: '//cdn.datatables.net/plug-ins/1.11.3/i18n/ru.json'
                @else
                    url: '//cdn.datatables.net/plug-ins/1.11.3/i18n/en-gb.json'
                @endif
            }
        });
    });
</script>
@endsection
