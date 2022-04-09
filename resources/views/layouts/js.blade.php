<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<!-- UIkit JS -->
<script src="https://cdn.jsdelivr.net/npm/uikit@3.3.7/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.3.7/dist/js/uikit-icons.min.js"></script>
<!-- Addons -->
<script type="text/javascript" src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/select2.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/sweetalert.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/dataTables.material.min.js')}}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/12.1.0/classic/ckeditor.js"></script>
<script type="text/javascript" src="{{asset('js/tata.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script id="dsq-count-scr" src="//digitalk-1.disqus.com/count.js" async></script>

<script type="text/javascript">
    $(window).on("load", function () {
        // Animate loader off screen
        $(".loading-wrapper").fadeOut('slow');
    });

    function comfirm_popup(form, message) {
        swal({
            title: "<h5 class=font-bold center black-text style=font-size:1.8rem;>" + message + "<h5>",
            confirmButtonText: "Yes!",
            type: "warning",
            allowOutsideClick: true,
            showCancelButton: true,
            allowEscapeKey: true,
            confirmButtonColor: "#ec454f",
            cancelButtonText: "Cancel",
            closeOnConfirm: true,
            html: true,
        }, function (isComfirm) {
            if (isComfirm) {
                form.submit();
            } else {
                swal.close();
            }
        });
    }

    function warning_toast(message) {
        tata.warn('', message, {
            'animate': 'slide',
            'position': 'br',
            'duration': '6000',
        });
    }

    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });

</script>
<script>
    $(document).ready(function () {
        fetch_customer_data();

        function fetch_customer_data(query = '') {
            $.ajax({
                url: "{{ route('search') }}",
                method: 'GET',
                data: {query: query},
                dataType: 'json',
                success: function (data) {
                    $('#search_result').html(data.table_data);
                    // $('#total_records').text(data.total_data);
                }
            })
        }

        $(document).on('keyup', '#search_barz', function () {
            var query = $(this).val();
            fetch_customer_data(query);
        });
    });
</script>
@if (session('alert'))
    <script type="text/javascript">
        swal({
            title: "<h5 class=font-bold center black-text style=font-size:1.8rem;>{{ session('alert') }}<h5>",
            confirmButtonText: "Okay!",
            type: "success",
            allowOutsideClick: true,
            allowEscapeKey: true,
            confirmButtonColor: "#789904",
            closeOnConfirm: true,
            html: true,
        });
    </script>
@endif
@if (session('whythehell'))
    <script type="text/javascript">
        swal({
            title: "<h5 class=font-bold center black-text style=font-size:1.8rem;>{{ session('whythehell') }}<h5>",
            confirmButtonText: "Okay",
            type: "error",
            allowOutsideClick: true,
            allowEscapeKey: true,
            confirmButtonColor: "red",
            closeOnConfirm: true,
            html: true,
        });
    </script>
@endif
@if (session('warning'))
    <script type="text/javascript">
        swal({
            title: "<h5 class=font-bold center black-text style=font-size:1.8rem;>{{ session('warning') }}<h5>",
            confirmButtonText: "Okay",
            imageUrl: '{{asset('img/404.svg')}}',
            imageWidth: 400,
            imageHeight: 200,
            allowOutsideClick: true,
            allowEscapeKey: true,
            confirmButtonColor: "#789904",
            closeOnConfirm: true,
            html: true,
        });
    </script>
@endif
@if(session('toast_success'))
    <script type="text/javascript">
        $(window).on("load", function () {
            // Animate loader off screen
            tata.success('', '{{session('toast_success')}}', {
                'animate': 'slide',
                'position': 'br',
                'duration': '6000',
            });
        });
    </script>
@endif
@if(session('toast_warning'))
    <script type="text/javascript">
        $(window).on("load", function () {
            // Animate loader off screen
            tata.warn('', '{{session('toast_warning')}}', {
                'animate': 'slide',
                'position': 'br',
                'duration': '6000',
            });
        });
    </script>
@endif
@if(session('toast_error'))
    <script type="text/javascript">
        $(window).on("load", function () {
            // Animate loader off screen
            tata.error('', '{{session('toast_error')}}', {
                'animate': 'slide',
                'position': 'br',
                'duration': '6000',
            });
        });
    </script>
@endif
