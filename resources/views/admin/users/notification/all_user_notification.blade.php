@extends('layouts.admin.layout')
@section('title')
    {{ __('User Notification') }}
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
        #allnotificationtable_length{
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
            {{ __(' User Notification List') }}
        @endslot
        @slot('link')
            {{ route('admin.getNotification') }}
        @endslot
    @endcomponent
    <x-list_view>
        <x-slot name="card_heard"> {{ __('All Notifications') }} </x-slot>
        <x-slot name="search_label">
            <div class="row g-3">
                <div class="col-xxl-5 col-sm-5">
                    <div class="search-box">
                        <input type="text" name="filter_search_key" id="filter_search_key" class="form-control search"
                            placeholder="{{ __('main.search') }}">
                        <i class="ri-search-line search-icon"></i>
                    </div>
                </div>
                <!--end col-->

                <div class="col-xxl-3 col-sm-4">
                    <div class="d-lg-inline-flex">
                        <button type="button" id="search_filter" class="btn btn-primary mx-1 btn-custom"
                            style="width: 120px;"><i class="ri-search-line me-1 align-bottom"></i>
                            {{ __('main.search') }}</button>
                        <button type="button" id="reset_filter" class="btn btn-success mx-1 btn-custom"
                            style="width: 120px;"><i class="ri-refresh-line me-1 align-bottom"></i>
                            {{ __('main.reset') }}</button>
                        <button type="button" id="delete_all_notifications" class="btn btn-danger mx-1 btn-custom"
                            style="width: 120px;"><i class="ri-delete-bin-line me-1 align-bottom remove-item-btn"></i>
                            {{ __('main.truncate') }}</button>
                    </div>
                </div>
                <!--end col-->
            </div>
        </x-slot>
        <x-slot name="table_id">allnotificationtable</x-slot>
        <x-slot name="table_th">
            <th>{{ __('main.user') }}</th>
            <th>{{ __('main.email') }}</th>
            <th>{{ __('main.type') }}</th>
            <th>{{ __('main.message') }}</th>
        </x-slot>
    </x-list_view>
@endsection
@section('script')
    @include('layouts.admin.scripts.Datatables_scripts')
    <script src="{{ asset('assets/js/pages/dropify.min.js') }}"></script>

    <script>
        $(document).ready(function() {
         $('.dropify').dropify();
         $('#allnotificationtable').DataTable({
                keys: true,
                info: true,
                sort: true,
                searching: false,
                select: false,
                ordering: true,
                scrollX: true,
                scrollCollapse: true,
                jQueryUI: true,
                displayStart: 0,
                stateSave: true,
                autoWidth: false,
                paging: true,
                fixedHeader: true,
                fixedColumns: false,
                responsive: true,
                processing: true,
                serverSide: true, // Indicate that server-side processing is enabled
                ajax: {
                    url: "{{ route('dataTable.userNotificationdataTable') }}",
                    type: "GET",
                    data: function(d) {
                        d.filterSearchKey = $("#filter_search_key").val();
                    }
                },
                columns: [
                    {
                        data: 'username',
                        name: 'username'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'type',
                        name: 'type',
                        render: function(data, type, row) {
                            return data === 'App\\Notifications\\OrderReminder' ? 'Order Reminder Notification' : 'New Order Notification';
                        }
                    },
                    {
                        data: 'message',
                        name: 'message'
                    },
              
                ]
            });
        });
    

        $("#search_filter").click(function(e) {
            e.preventDefault();
            $('#allnotificationtable').DataTable().ajax.reload();
        });

        $("#reset_filter").click(function(e) {
            e.preventDefault();
            $('#filter_search_key').val('');
            $('#filter_status').prop('selectedIndex', 0);
            $('#filter_date').val('');
            $('#allnotificationtable').DataTable().ajax.reload();
        });

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('body').on('click', '#delete_all_notifications', function(e) {
                e.preventDefault();
                swal({
                        title: "Are you sure you wan to delete all notifications?",
                        text: "Once deleted, you will not be able to recover these notifications!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                type: "GET",
                                url: "{{ route('admin.deleteNotification') }}",
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                },
                                success: function(response) {
                                    if (response.status === 'No notifications to delete') {
                                        swal({
                                            title: "No Notifications",
                                            text: response.status,
                                            icon: "info",
                                            button: "Okay",
                                        });
                                    } else {
                                        swal({
                                            title: "Success!",
                                            text: response.status,
                                            icon: "success",
                                            timer: 3000,
                                        }).then((result) => {
                                            window.location =
                                                '{{ route('admin.getNotification') }}';
                                        });
                                    }
                                },
                                error: function(xhr, status, error) {
                                    swal('Error!', 'Failed to delete notificatios.',
                                        'error');
                                }
                            });
                        }
                    });
            });
        });
    </script>
@endsection
