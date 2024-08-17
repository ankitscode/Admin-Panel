@extends('layouts.admin.layout')
@section('title')
    {{ __('main.view_user') }}
@endsection
@section('css')
    <style>
        .equal-height-row {
            display: flex;
            flex-wrap: wrap;
        }

        .equal-height-row .col-lg-8,
        .equal-height-row .col-lg-4 {
            display: flex;
            flex-direction: column;
        }

        .equal-height-row .card {
            flex: 1;
        }

        .pagination {
            float: right;
        }
    </style>
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            {{ __('main.view') }}
        @endslot
        @slot('title')
            {{ __('main.users') }}
        @endslot
        @slot('link')
            {{ route('admin.usersList') }}
        @endslot
    @endcomponent
    <div class="container">
        <div class="row equal-height-row">
            <div class="col-lg-8">
                <!-- User Details Card -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex align-items-center">
                        <h6 class="m-0 font-weight-bold text-primary flex-grow-1">{{ __('main.user_details') }}</h6>
                        <div class="flex-shrink-0">
                            <a
                              @if ($userDetails->id === Auth::user()->id) href="javascript:void(0)"
                                class="btn btn-disable"
                                @disabled(true)
                            @else
                                href="{{ route('admin.editUser', ['id' => $userDetails->id]) }}"
                                class="btn btn-primary edit-item-btn" @endif><i
                                    class="ri-edit-line fs-16"></i></a>
                            <a href="javascript:void(0)"
                                @if ($userDetails->id === Auth::user()->id) class="btn btn-disable"
                                @disabled(true)
                            @else
                                class="btn btn-danger remove-item-btn"
                                data-id="{{ $userDetails->id }}" @endif><i
                                    class="ri-delete-bin-2-line fs-16"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <tbody>
                                    <tr>
                                        <td class="font-bold-600" style="width: 25%;">{{ __('main.full_name') }}</td>
                                        <td>{{ $userDetails->full_name ? $userDetails->full_name : null }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold-600" style="width: 25%;">{{ __('main.email') }}</td>
                                        <td>{{ $userDetails->email ? $userDetails->email : null }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold-600" style="width: 25%;">{{ __('main.phone_number') }}</td>
                                        <td>{{ $userDetails->phone ? $userDetails->phone : null }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold-600" style="width: 25%;">{{ __('main.birthday') }}</td>
                                        <td>{{ !empty($userDetails->birthdate) ? date('F jS Y', strtotime($userDetails->birthdate)) : '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold-600" style="width: 25%;">{{ __('main.gender') }}</td>
                                        <td>{{ isset($userDetails->genderType->name) ? $userDetails->genderType->name : '' }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 ">
                <!-- Profile Picture Card -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __('main.profile_picture') }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="card-body text-center">
                            <img class="rounded-circle mb-2 avater-ext"
                                src="{{ !empty($userDetails->media->name) ? asset(config('image.profile_image_path_view') . $userDetails->media->name) : asset('assets/images/users/user-dummy-img.jpg') }}"
                                style="height: 10rem;width: 10rem;">
                            <div class="large text-muted mb-4">
                                <span
                                    class="badge rounded-pill badge-outline-{{ $userDetails->is_active == 1 ? 'success' : 'danger' }}">
                                    {{ $userDetails->is_active ? __('main.active') : __('main.in_active') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-lg-12">
                <!-- User Interests Table -->
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h5 class="card-title mb-0 flex-grow-1 text-primary">{{ __('User Subscription List') }}</h5>
                    </div>
                    <div class="card-body">
                        <table id="usersubscription-datatable"
                            class="table table-nowrap dt-responsive table-bordered display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>{{ __('Plan') }}</th>
                                    <th>{{ __('Duration') }}</th>
                                    <th>{{ __('Amount') }}</th>
                                    <th>{{ __('Start Date') }}</th>
                                    <th>{{ __('End Date') }}</th>
                                    <th>{{ __('Status') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($userDetails->usersubscription as $plan)
                                    <tr>
                                        <!-- subscription table data -->
                                        <td>{{ $plan->subscription->name }}</td>
                                        <td>{{ $plan->subscription->duration }}</td>
                                        <td>{{ $plan->subscription->amount }}</td>
                                        <td>{{ $plan->created_at }}</td>
                                        <!-- usersubscriptions table  data -->
                                        <td>{{ $plan->end_date_time }}</td>
                                        <td>
                                            @if ($plan->is_active == 1)
                                                <span class="badge badge-soft-success text-uppercase">Active</span>
                                            @else
                                                <span class="badge badge-soft-danger text-uppercase">Not Active</span>
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
        <div class="row">
            <div class="col-lg-12">
                <!-- User Interests Table -->
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h5 class="card-title mb-0 flex-grow-1 text-primary">{{ __('User Interest List') }}</h5>
                    </div>
                    <div class="card-body">
                        <table id="userinterest-datatables" class="table table-nowrap dt-responsive table-bordered display"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th style="width: 50%;">{{ __('Interest') }}</th>
                                    <th style="width: 50%;">{{ __('Status') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($userDetails->interests as $interest)
                                    <tr>
                                        <td>{{ $interest->category->name }}</td>
                                        <td>
                                            @if ($interest->is_active == 1)
                                                <span class="badge badge-soft-success text-uppercase">Active</span>
                                            @else
                                                <span class="badge badge-soft-danger text-uppercase">Not Active</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
@section('script')
    @include('layouts.admin.scripts.Datatables_scripts')
    <script>
        $(document).ready(function() {
            $('#usersubscription-datatable').DataTable({
                responsive: true,
                paging: true,
                lengthChange: false,
                searching: false,
                info: true,
                ordering: false,
                autoWidth: true,
                paginate: true,
            });

            $('#userinterest-datatables').DataTable({
                responsive: true,
                paging: true,
                lengthChange: false,
                searching: false,
                info: true,
                ordering: false,
                autoWidth: true,
                paginate: true,
            });
            $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        $('body').on('click','.remove-item-btn',function(e) {
        e.preventDefault();
        var id = $(this).data("id");
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this user!",
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
                url: "{{ route('admin.destroyUser', '') }}" + "/" + id,
                data: data,
                success: function(response) {
                    swal(response.status, {
                        icon: "success",
                        timer: 3000,
                    })
                    .then((result) => {
                        window.location =
                        '{{ route('admin.usersList') }}'
                    });
                }
                });
            }
            });
        });

        });
    </script>
@endsection
