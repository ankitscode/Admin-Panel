@extends('layouts.admin.layout')
@section('title')
    {{ __('main.users') }}
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
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            {{ __('main.index') }}
        @endslot
        @slot('title')
            {{ __('main.users') }}
        @endslot
        @slot('link')
            {{ route('admin.usersList') }}
        @endslot
    @endcomponent
    <x-list_view>
        <x-slot name="card_heard"> {{ __('main.all_users') }} </x-slot>
        {{-- <x-slot name="create_button_href"> {{ route('admin.deletedUserInfo') }} </x-slot>
        <x-slot name="create_button_title"> {{ __('main.deleted_users') }} </x-slot> --}}
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
               
                <!--end col-->
                <div class="col-xxl-3 col-sm-4">
                    <div class="d-flex">
                        <button type="button" id="search_filter" class="btn btn-primary w-100 mx-1" ><i class=" ri-search-line me-1 align-bottom"></i> {{__('main.search')}}</button>
                        <button type="button" id="reset_filter" class="btn btn-success w-100 mx-1"><i class="ri-refresh-line me-1 align-bottom"></i> {{__('main.reset')}}</button>
                    </div>
                </div>
                <!--end col-->
            </div>
        </x-slot>
        <x-slot name="table_id"> usersTable </x-slot>
        <x-slot name="table_th">
            <th>{{ __('main.image') }}</th>
            <th>{{ __('fullname') }}</th>
            <th>{{ __('main.email') }}</th>
            <th>{{ __('main.phone') }}</th>
            <th>{{ __('main.status') }}</th>
            <th>{{ __('main.action') }}</th>
        </x-slot>
    </x-list_view>
@endsection
@section('script')
    @include('layouts.admin.scripts.Datatables_scripts')
    <script>
        $(document).ready(function() {
            $('#usersTable').DataTable({
            'responsive'    : true,
            'paging'        : true,
            'lengthChange'  : false,
            'searching'     : false,
            'ordering'      : true,
            'info'          : true,
            'autoWidth'     : false,
            "processing"    : true,
            "serverSide"    : true,
                ajax: {
                    "url": "{{ route('dataTable.dataTableUsersListTable') }}",
                    "type": "GET",
                    "data": function ( d ) {
                                        d.filterSearchKey = $("#filter_search_key").val();
                                        d.filterStatus = $("#filter_status").val();
                                        d.filterDate = $("#filter_date").val();
                                }
                },
                columns: [{
                        data: 'profile_image',
                        render: function(data, type, row) {
                            return data ? '<img src="' + data +
                                '" alt="Profile Image" class="img-fluid d-block">' : '';
                        }
                    },
                    {
                        data: 'full_name',
                        name: 'full_name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'is_active',
                        render: function(data, type, row) {
                            return data == 1 ?
                                '<span class="badge badge-soft-success text-uppercase">Active</span>' :
                                '<span class="badge badge-soft-danger text-uppercase">Not Active</span>';
                        }
                    },
                    {
                        data: 'Action',
                        name: 'Action',
                        render: function(data, type, row) {
                            return data;
                        }
                    },
                ],
                columnDefs: [{
                        targets: 0,
                        className: "text-center avatar-sm bg-light rounded p-1",
                        searchable:false,
                        orderable: false,
                    },
                    {
                        targets: [1, 2, 3,4,5],
                        className: "text-center",
                        searchable:false,
                        orderable: true,
                        defaultContent: '-'
                    },
                ],
                // language: {
                //     url: '{{ asset('js/Arabic.json') }}' // Adjust language file path as needed
                // }
            });
        });


        $("#search_filter").click(function(e) {
            e.preventDefault();
            $('#usersTable').DataTable().ajax.reload();
        });

        $("#reset_filter").click(function(e) {
            e.preventDefault();
            $('#filter_search_key').val('');
            $('#filter_status').prop('selectedIndex', 0);
            $('#filter_date').val('');
            $('#usersTable').DataTable().ajax.reload();
        });
    </script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('body').on('click', '.remove-item-btn', function(e) {
                e.preventDefault();
                var id = $(this).data("id");

                swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this User!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                type: "DELETE",
                                url: "{{ route('admin.destroyUser', '') }}" + "/" + id,
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "id": id,
                                },
                                success: function(response) {
                                    swal(response.status, {
                                            icon: "success",
                                            timer: 3000,
                                        })
                                        .then((result) => {
                                            window.location =
                                                '{{ route('admin.usersList') }}';
                                        });
                                },
                                error: function(xhr, status, error) {
                                    swal('Error!', 'Failed to delete user.', 'error');
                                }
                            });
                        }
                    });
            });
        });
    </script>
@endsection
