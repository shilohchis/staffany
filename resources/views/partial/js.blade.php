<!-- Vendor scripts -->
<script src="{{ asset('js/pace.min.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap/bootstrap.js') }}"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script>
<script src="{{ asset('js/select2.js') }}"></script>
<script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
<!-- App scripts -->
<script src="{{ asset('js/luna.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#logout').click(function() {
            $('#logout-form').submit();
        });
        $('button.del').click(function() {
            $('#delete-form').attr('action', $(this).data('url'));
        });

        @if(session('success-title'))
            toastr["success"](@json(session('success-title')), @json(session('success-msg')));
        @endif
    });
</script>
