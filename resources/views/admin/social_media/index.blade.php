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
                <div class="col-6">
                    <a style="float: right" href="{{ route('admin.social_media.create') }}"
                        class="btn btn-success">{{ __('create') }}</a>
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
                            <table class="display" id="social_medias">
                                <thead>
                                    <tr>
                                        <th>Row</th>
                                        <th>Name</th>
                                        <th>Url</th>
                                        <th>Icon</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($social_medias as $social_media)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $social_media->name }}</td>
                                            <td>{{ $social_media->url }}</td>
                                            <td><i class="{{ $social_media->icon }}" style="font-size: 25px"></i></td>
                                            <td>
                                                <a href="{{ route('admin.social_media.edit', $social_media) }}"
                                                    class="btn btn-success">{{ __('edit') }}</a>

                                                <a href="{{ route('admin.social_media.destroy', $social_media) }}"
                                                    class="btn btn-danger delete">{{ __('delete') }}</a>
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
        $('#social_medias').DataTable({
            language: {
                @if (app()->getLocale() === 'az')
                    url: '//cdn.datatables.net/plug-ins/1.11.3/i18n/az_az.json'
                @elseif (app()->getLocale() === 'ru')
                        url: '//cdn.datatables.net/plug-ins/1.11.3/i18n/ru.json'
                @else
                    url: '//cdn.datatables.net/plug-ins/1.11.3/i18n/en-gb.json'
                @endif
            }
        });
    });
</script>
@endsection
