@extends('layouts.admin.layout')
@section('title')
    {{ __('main.admin') }}
@endsection
@section('css')
    <link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/libs/swiper/swiper.min.css') }}" rel="stylesheet" type="text/css" />
    <!--datatable css-->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <!--datatable responsive css-->
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href={{ asset('assets/css/dropify.css') }}>
    <style>
     #adminTable_length{
        display: none;
     }
    </style>
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            {{ __('main.index') }}
        @endslot
        @slot('title')
            {{ __('main.admin') }}
        @endslot
        @slot('link')
            {{ route('admin.adminList') }}
        @endslot
    @endcomponent
    <x-list_view>
        <x-slot name="card_heard"> {{ __('main.all_admins') }} </x-slot>
        <x-slot name="create_button_href"> {{ route('admin.createAdmin') }} </x-slot>
        <x-slot name="create_button_title"> {{ __('main.create_admin') }} </x-slot>
        <x-slot name="search_label">
            <div class="row g-3">
                <div class="col-xxl-5 col-sm-6">
                    <div class="search-box">
                        <input type="text" name="filter_search_key" id="filter_search_key" class="form-control search"
                            placeholder="{{ __('main.search') }}">
                        <i class="ri-search-line search-icon"></i>
                    </div>
                </div>
                <!--end col-->
                <div class="col-xxl-2 col-sm-4">
                    <div class="form-group">
                        <select class="form-control" name="filter_status" id="filter_status">
                            <option value="all">{{ __('main.all') }}</option>
                            <option value="1">{{ __('main.active') }}</option>
                            <option value="0">{{ __('main.in_active') }}</option>
                        </select>
                    </div>
                </div>
                <!--end col-->
                <div class="col-xxl-3 col-sm-4">
                    <div class="d-flex">
                        <button type="button" id="search_filter" class="btn btn-primary w-100 mx-1"><i
                                class=" ri-search-line me-1 align-bottom"></i> {{ __('main.search') }}</button>
                        <button type="button" id="reset_filter" class="btn btn-success w-100 mx-1"><i
                                class="ri-refresh-line me-1 align-bottom"></i> {{ __('main.reset') }}</button>
                    </div>
                </div>
                <!--end col-->
            </div>
        </x-slot>
        <x-slot name="table_id"> adminTable
        </x-slot>
        <x-slot name="table_th">
            <th>{{ __('main.image') }}</th>
            <th>{{ __('main.fullname') }}</th>
            <th>{{ __('main.email') }}</th>
            <th>{{ __('main.phone') }}</th>
            <th>{{ __('main.status') }}</th>
            <th>{{ __('main.role') }}</th>
            <th>{{ __('main.action') }}</th>
        </x-slot>
    </x-list_view>
@endsection
@section('script')
    @include('layouts.admin.scripts.Datatables_scripts')
    <script>
        const lang = sessionStorage.getItem('lang');
        $(document).ready(function() {
            $('#adminTable').DataTable({
                responsive: true,
                processing: true,
                keys: true,
                info: true,
                sort: true,
                searching: false,
                select: false,
                ordering: true,
                scrollY: '50vh',
                scrollX: true,
                scrollCollapse: true,
                jqueryUI: true,
                displayStart: 0,
                stateSave: true,
                autoWidth: false,
                paging: true,
                fixedHeader: true,
                fixedColumns: false,
                columnReorder: true,
                "ajax": {
                    "url": "{!! route('dataTable.dataTableAdminsListTable') !!}",
                    "type": "GET",
                    "data": function(d) {
                        d.filterSearchKey = $("#filter_search_key").val();
                        d.filterStatus = $("#filter_status").val();
                        d.filterDate = $("#filter_date").val();
                    }
                },
                "columns": [{
                        data: 'profile_image',
                        render: function(data, type, row) {
                            return data ? '<img src="' + data +
                                '" alt="Profile Image" class="img-fluid d-block">' : '';
                        }
                    },
                    {
                        "data": "full_name",
                        "render": function(data, type, row) {
                            return row.full_name;
                        },
                    },
                    {
                        "data": "email"
                    },
                    {
                        "data": "phone"
                    },
                    {
                        "data": "is_active",
                        "render": function(data, type, row) {
                            if (data == 1) {
                                return '<span class="badge badge-soft-success text-uppercase">Active</span>';
                            } else {
                                return '<span class="badge badge-soft-danger text-uppercase">Not Active</span>';
                            }
                        },
                    },
                    {
                        "data": "roles",
                        "render": function(data, type, row) {
                            return (data.length > 0) ? data[0].name :
                                '<span class="badge badge-soft-danger text-uppercase">{{ __('main.no_role_found') }}</span>';
                        }
                    },
                    {
                        "data": "uuid",
                        "render": function(data, type, row) {
                            return '<li class="list-inline-item edit"><a href="{{ route('admin.viewAdmin', '') }}/' +
                                row.uuid + '" data-id="' + row.uuid +
                                '" class="text-primary d-inline-block edit-btn"><i class="ri-eye-fill fs-16"></i></a></li><li class="list-inline-item edit"><a href="{{ route('admin.editAdmin', '') }}/' +
                                row.uuid + '" data-id="' + row.uuid +
                                '" class="text-primary d-inline-block edit-btn"><i class="ri-pencil-fill fs-16"></i></a></li><li class="list-inline-item"><a class="text-danger d-inline-block remove-item-btn"  data-id="' +
                                row.uuid +
                                '" href="javascript:void(0)"><i class="ri-delete-bin-5-fill fs-16"></i></a></li>';
                        },
                    },
                ],
                'columnDefs': [{
                        "targets": 0,
                        'searchable': false,
                        'orderable': false,
                        'width': '10%',
                        'className':'text-center avatar-sm bg-light rounded p-1',
                        'defaultContent': '-'
                    },
                    {
                        "targets": 1,
                        'searchable': true,
                        'orderable': true,
                        'width': '15%',
                        'className': 'text-center',
                        'defaultContent': '-'
                    },
                    {
                        "targets": 2,
                        'searchable': true,
                        'orderable': false,
                        'width': '15%',
                        'className': 'text-center',
                        'defaultContent': '-'
                    },
                    {
                        "targets": 3,
                        'searchable': true,
                        'orderable': false,
                        'width': '15%',
                        'className': 'text-center',
                        'defaultContent': '-'
                    },
                    {
                        "targets": 4,
                        'searchable': false,
                        'orderable': false,
                        'width': '15%',
                        'className': 'text-center',
                        'defaultContent': '-'
                    },
                    {
                        "targets": 5,
                        'searchable': false,
                        'orderable': false,
                        'width': '20%',
                        'className': 'text-center',
                        'defaultContent': '-'
                    },
                    {
                        "targets": 6,
                        'searchable': false,
                        'orderable': false,
                        'width': '30%',
                        'className': 'text-center',
                        'defaultContent': '-'
                    },
                ],
                language: {
                    url: '@if (session()->get('locale') == 'ar') {{ asset('js/Arabic.json') }} @elseif (session()->get('locale') == 'fr') {{ asset('js/French.json') }} @endif'
                }
            });
        });

        $("#search_filter").click(function(e) {
            e.preventDefault();
            $('#adminTable').DataTable().ajax.reload();
        });

        $("#reset_filter").click(function(e) {
            e.preventDefault();
            $('#filter_search_key').val('');
            $('#filter_status').prop('selectedIndex', 0);
            $('#adminTable').DataTable().ajax.reload();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('body').on('click', '.remove-item-btn', function(e) {
                e.preventDefault();
                var id = $(this).data("id");
                swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this Admin!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            var data = {
                                "_token": $('a[name="csrf-token"]').val(),
                                "id": id,
                            }
                            $.ajax({
                                type: "DELETE",
                                url: "{{ route('admin.destroyAdmin', '') }}" + "/" + id,
                                data: data,
                                success: function(response) {
                                    swal(response.status, {
                                            icon: "success",
                                            timer: 3000,
                                        })
                                        .then((result) => {
                                            window.location =
                                                '{{ route('admin.adminList') }}'
                                        });
                                }
                            });
                        }
                    });
            });
        });
    </script>
@endsection
