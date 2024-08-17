<!-- Your HTML structure remains the same -->

<!-- JavaScript section -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ asset('assets/libs/jquery-toast-plugin-master/src/jquery.toast.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="{{ asset('assets/libs/prismjs/prismjs.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/dropify.min.js') }}"></script>
{{-- <script src="{{ URL('assets/js/firebase.js') }}"></script> --}}

<!-- Your custom scripts -->
<script src="{{ asset('assets/libs/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/libs/node-waves/node-waves.min.js') }}"></script>
<script src="{{ asset('assets/libs/feather-icons/feather-icons.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins.min.js') }}"></script>
<script src="{{ asset('assets/js/app.min.js') }}"></script>


{{-- Toastr --}}

<script>
    @if (Session::has('success'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.success("{{ session('success') }}");
    @endif

    @if (Session::has('alert-success'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.success("{{ session('alert-success') }}");
    @endif

    @if (Session::has('alert-error'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.error("{{ session('alert-error') }}");
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("* {{ $error }}");
        @endforeach
    @endif

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(function() {
        $('body').on('click', ".mutli-lang", function(e) {
            var lang_field = $(this).attr('data-lang-field');
            var lang_type = $(this).attr('data-lang-type');
            var field_type = $(this).attr('data-field-type');
            console.log(lang_field, 'lang_field', lang_type, 'lang_type', field_type, 'field_type', "" +
                field_type + "[name='" + lang_field + "[en]']");
            if (lang_type == 'en') {
                $("" + field_type + "[name='" + lang_field + "[en]']").show();
                $("" + field_type + "[name='" + lang_field + "[ar]']").hide();
                $(this).parent().children().css("color", "");
                $(this).css("color", "#38b7fe");
            } else if (lang_type == 'ar') {
                $("" + field_type + "[name='" + lang_field + "[en]']").hide();
                $("" + field_type + "[name='" + lang_field + "[ar]']").show();
                $(this).parent().children().css("color", "");
                $(this).css("color", "#38b7fe");
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });


    $(document).ready(function() {
        $('.mark-as-read').on('click', function(e) {
            e.preventDefault();
            var notificationId = $(this).data('id');
            $.ajax({
                url: "{{ route('admin.markNotification') }}",
                type: 'POST',
                data: {
                    id: notificationId
                },
                success: function(response) {
                    console.log('Notification marked as read');
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error('Error marking notification as read:', error);
                }
            });
        });
    });
</script>
<!-- Additional script sections as needed -->
@auth
    {{-- @include('admin.component.notification') --}}
@endauth
@yield('script')
@yield('script-bottom')
