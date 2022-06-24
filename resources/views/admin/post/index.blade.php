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
                    <h3>{{ __('post list') }}</h3>
                </div>
                <div class="col-6">
                    <a style="float: right" href="{{ route('admin.post.create') }}" class="btn btn-success">{{ __('create') }}</a>
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
                            <table class="display" id="posts">
                                <thead>
                                    <tr>
                                        <th>{{ __('row') }}</th>
                                        <th>{{ __('image') }}</th>
                                        <th>{{ __('title') }}</th>
                                        <th>{{ __('status') }}</th>
                                        <th>{{ __('action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><img src="{{ asset($post->image) }}" alt="" style="width: 100px"></td>
                                            <td>{{ $post->title }}</td>
                                            <td class="font-success">{{ $post->isActive == 1 ? __('active') : __('deactive')  }}</td>
                                            <td>
                                                <a href="{{ route('admin.post.edit', $post) }}"
                                                    class="btn btn-success">{{ __('edit') }}</a>
                                                @if ($post->isActive == 1)
                                                    <a href="{{ route('admin.post.destroy', $post) }}"
                                                        class="btn btn-danger delete">{{ __('delete') }}</a>
                                                @else
                                                    <a href="{{ route('admin.post.active', $post) }}"
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
        $('#posts').DataTable({
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
