@extends('layouts.admin.layout')
@section('title')
    {{ __('main.categories') }}
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
            {{ __('main.categories') }}
        @endslot
        @slot('link')
            {{ route('admin.categoriesList') }}
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">{{ __('main.category_list') }}</h5>
                    <div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            {{ __('+ Add Category') }}
                        </button>
                    </div>
                </div>
                <div class="card-body borde border-end-0 border-start-0">
                    {{-- <hr class="dashed-2"> --}}
                    <div class="row g-3">
                        <div class="col-xxl-5 col-sm-6">
                            <div class="search-box">
                                <input type="text" name="filter_search_key" id="filter_search_key"
                                    class="form-control search" placeholder="{{ __('main.search') }}">
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
                    <div class="py-3">
                        <table id="category-datatables" class="table table-nowrap dt-responsive table-bordered display"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>{{ __('main.category_name') }}</th>
                                    <th>{{ __('main.status') }}</th>
                                    <th>{{ __('main.is_menu') }}</th>
                                    <th>{{ __('main.action') }}</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-light p-3">
                                    <h5 class="modal-title" id="exampleModalLabel">{{ __('main.create_category') }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form id="category-create-form" method="POST" action="{{ route('admin.storeCategory') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <input type="hidden"  name="category_id" id="category_id" />

                                        <div class="mb-3" id="modal-id">
                                            <label class="form-label" for="name">{{ __('main.category_name') }}</label>
                                            <input id="name" placeholder="Enter category name" name="name" type="text" class="form-control"  required/>
                                        </div>
                                        {{-- Image upload section (if needed) --}}
                                        {{-- <div class="mb-3">
                                <label class="form-label" for="image">{{ __('main.upload_image') }} <code>({{ __('main.required') }})</code></label>
                                <input class="dropify" id="image" name="image" type="file" accept="image/png, image/jpeg, image/jpg" />
                            </div> --}}
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-check">
                                                        <input type="checkbox" id="is_active" name="is_active"
                                                            class="form-check-input" checked />
                                                        <label class="form-check-label"
                                                            for="is_active">{{ __('main.is_active') }}</label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-check">
                                                        <input type="checkbox" id="is_menu" name="is_menu"
                                                            class="form-check-input" checked />
                                                        <label class="form-check-label"
                                                            for="is_menu">{{ __('main.is_menu') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="button" class="btn btn-light"
                                                data-bs-dismiss="modal">{{ __('main.close') }}</button>
                                            <button type="submit" class="btn btn-success"
                                                id="submit-btn">{{ __('main.create_category') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="showModalEdit" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header bg-light p-3">
                                    <h5 class="modal-title">{{ __('main.edit_category') }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                        id="close-modal"></button>
                                </div>
                                <div id="edit-modal-header"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                        id="btn-close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mt-2 text-center">
                                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                            colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px">
                                        </lord-icon>
                                        <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                            <h4>{{ __('main.Are you sure ?') }}</h4>
                                            <p class="text-muted mx-4 mb-0">
                                                {{ __('main.Are you sure you want to remove this record ?') }}</p>
                                        </div>
                                    </div>
                                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                        <button type="button" class="btn w-sm btn-light"
                                            data-bs-dismiss="modal">{{ __('main.close') }}</button>
                                        <button type="button" class="btn w-sm btn-danger "
                                            id="delete-record">{{ __('main.Yes, Delete It!') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end modal -->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    @include('layouts.admin.scripts.Datatables_scripts')
    <script src={{ asset('assets/js/pages/dropify.min.js') }}></script>

    <script>
        const lang = sessionStorage.getItem('lang');
        console.log('lang', lang);
        $(document).ready(function() {
            $('.dropify').dropify();

            $('#category-datatables').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false,
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{!! route('dataTable.dataTablecategoriestable') !!}",
                    "type": "GET",
                    "data": function(d) {
                        d.filterSearchKey = $("#filter_search_key").val();
                        d.filterStatus = $("#filter_status").val();
                    }
                },
                "columns": [{
                        "data": "name",
                        "render": function(data, type, row) {
                            return data;
                        }
                    },
                    {
                        "data": "is_active",
                        "render": function(data, type, row) {
                            if (data == 1) {
                                return '<a href="#"><span class="badge badge-soft-success text-uppercase">Active</span></a>';
                            } else {
                                return '<a href="#"><span class="badge badge-soft-danger text-uppercase">Not Active</span></a>';
                            }
                        },
                    },
                    {
                        "data": "is_menu",
                        "render": function(data, type, row) {
                            if (data == 1) {
                                return '<a href="#"><span class="badge badge-soft-success text-uppercase">Active</span></a>';
                            } else {
                                return '<a href="#"><span class="badge badge-soft-danger text-uppercase">Not Active</span></a>';
                            }
                        },
                    },
                    {
                        "data": "id",
                        "render": function(data, type, row) {
                            return '<li class="list-inline-item edit"><a href="javascript:void(0)" data-id="' +
                                row.id +
                                '" class="text-primary d-inline-block edit-btn"><i class="ri-pencil-fill fs-16"></i></a></li><li class="list-inline-item"><a class="text-danger d-inline-block remove-item-btn"  data-id="' +
                                row.id +
                                '" href="javascript:void(0)"><i class="ri-delete-bin-5-fill fs-16"></i></a></li>';
                        }
                    },
                ],
                'columnDefs': [{
                        "targets": 0,
                        "className": "text-center",
                        "defaultContent": "-"
                    },
                    {
                        "targets": 1,
                        "className": "text-center",
                        "defaultContent": "-"
                    },
                    {
                        "targets": 2,
                        "className": "text-center",
                        "defaultContent": "-",

                    },
                    {
                        "targets": 3,
                        "className": "text-center",
                        "defaultContent": "-",

                    },


                ],
                language: {
                                url: '@if (session()->get('locale') == 'ar') {{ asset('js/Arabic.json') }} @elseif (session()->get('locale') == 'fr') {{ asset('js/French.json') }} @endif'
                            }
            });

            $("#search_filter").click(function(e) {
                e.preventDefault();
                $('#category-datatables').DataTable().ajax.reload();
            });

            $("#reset_filter").click(function(e) {
                e.preventDefault();
                $('#filter_search_key').val('');
                $('#filter_status').prop('selectedIndex', 0);
                $('#category-datatables').DataTable().ajax.reload();
            });
        });

        $("#create-btn").click(function(e) {
            e.preventDefault();
            $('#showModalCreate').modal('show');
        });

        $("body").on('click', '.edit-btn', function(e) {
            e.preventDefault();
            $('#category-edit-form').trigger('reset');
            $('.dropify-clear').trigger('click');
            $('#edit-modal-header').html('');
            var editID = $(this).data('id');

            // Prepare the form HTML structure in advance
            var form =
                '<form id="category-edit-form" method="POST" action="{{ route('admin.updateCategory', '') }}/' +
                editID +
                '" enctype="multipart/form-data"> @csrf <div class="modal-body"> <div class="mb-3" id="modal-id"> <label for="edit_category_name" class="form-label">{{ __('main.category_name') }}</label><input type="text" class="form-control" placeholder="Enter category name" id="edit_category_name" name="category_name" placeholder="{{ __('main.Enter Category Name') }}" value="" required></div> <div class="mb-3"> <div class="row"> <div class="col-6"> <label class="form-check-label" for="edit_is_active"> <input type="checkbox" id="edit_is_active" name="is_active" class="form-check-input"/> {{ __('main.is_active') }}</label> </div> <div class="col-6"> <label class="form-check-label" for="edit_is_menu"> <input type="checkbox" id="edit_is_menu" name="is_menu" class="form-check-input"/> {{ __('main.is_menu') }}</label> </div> </div> </div> </div> <div class="modal-footer"> <div class="hstack gap-2 justify-content-end"> <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button> <button type="submit" class="btn btn-success" id="update-btn">{{ __('main.update') }}</button> </div> </div> </form>';

            // Append the form to the modal header
            $('#edit-modal-header').append(form);

            // Fetch data via AJAX
            $.ajax({
                type: "GET",
                url: "{{ route('admin.editCategory', '') }}/" + editID,
                success: function(response) {
                    // console.log(response);
                    if (response.data && response.data.name) {
                        $('#edit_category_name').val(response.data.name);
                        if (response.data.is_active === 1) {
                            $("#edit_is_active").prop("checked", true);
                        }
                        if (response.data.is_menu === 1) {
                            $("#edit_is_menu").prop("checked", true);
                        }
                    } else {
                        console.error('Invalid response format or missing data:', response);
                    }
                    $("#showModalEdit").modal('show');
                },
                error: function(response) {
                    console.log("error", response);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("body").on('click', '.remove-item-btn', function(e) {
                e.preventDefault();

                var id = $(this).data("id");
                swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this Data!",
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
                                url: "{{ route('admin.destroyCategory', '') }}" + "/" + id,
                                data: data,
                                success: function(response) {
                                    swal(response.status, {
                                            icon: "success",
                                            timer: 3000,
                                        })
                                        .then((result) => {
                                            location.reload();
                                        });
                                }
                            });
                        }
                    });
            });
        });
    </script>
@endsection
