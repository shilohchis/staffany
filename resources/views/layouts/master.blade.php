<!DOCTYPE html>
<html>
    <head>
        @include('partial.meta')

        <!-- Page title -->
        <title>{{ config('app.name') }} | Accounting Web</title>

        @include('partial.css')
    </head>
    <body class="@guest blank @endguest pace-done">
        @include('partial.spinner')

        <!-- Wrapper-->
        <div class="wrapper">
            @auth()
                @include('partial.header')
                @include('partial.sidebar')
            @endauth

            @yield('content')
            @auth
                <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <h4 class="modal-title"><i class="fa fa-exclamation-triangle red"></i> Delete confirmation</h4>
                            </div>
                            <div class="modal-body">
                                <p><strong>Are you sure to delete this data? It can't be reversible</strong></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <form method="POST" id="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-accent">Confirm</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endauth
        </div>
        <!-- End wrapper-->

        @include('partial.js')
        <script>
            $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
            function showFlash(icon, title) {
                Swal.fire({
                    position: 'top-end',
                    icon,
                    title,
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        </script>
        <script>
            @yield('custom-script')
        </script>
    </body>
</html>
