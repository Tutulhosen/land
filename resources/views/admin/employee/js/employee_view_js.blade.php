 <!--   Core JS Files   -->
    <script src="/assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="/assets/js/core/popper.min.js"></script>
    <script src="/assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Moment JS -->
    <script src="/assets/js/plugin/moment/moment.min.js"></script>

    <!-- Chart JS -->
    <script src="/assets/js/plugin/apexchart/apexcharts.min.js"></script>
    <script src="/assets/js/plugin/apexchart/chart-data.js"></script>

    <script src="/assets/js/plugin/chart.js/chart.min.js"></script>
    <script src="/assets/js/plugin/chart.js/chart-data.js"></script>
    <script src="/assets/js/plugin/chart.js/chart.js"></script>

    <script src="/assets/js/plugin/c3-chart/d3.v5.min.js"></script>
    <script src="/assets/js/plugin/c3-chart/c3.min.js"></script>
    <script src="/assets/js/plugin/c3-chart/chart-data.js"></script>

    <!-- Theme Script js -->
    <script src="/assets/js/theme-script.js"></script>

    <!-- Custom JS -->
    <script src="/assets/js/circle-progress.js"></script>
    <script src="/assets/js/todo.js"></script>
    <script src="/assets/js/theme-colorpicker.js"></script>
    <script src="/assets/js/script.js"></script>


    <!-- jQuery Sparkline -->
    <script src="/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <script src="/assets/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Datatables -->
    <script src="/assets/js/plugin/datatables/datatables.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- jQuery Vector Maps -->
    <script src="/assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
    <script src="/assets/js/plugin/jsvectormap/world.js"></script>

    <!-- Dropzone -->
    <script src="/assets/js/plugin/dropzone/dropzone.min.js"></script>

    <!-- Fullcalendar -->
    <script src="/assets/js/plugin/fullcalendar/fullcalendar.min.js"></script>

    <!-- DateTimePicker -->
    <script src="/assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js"></script>

    <!-- Bootstrap Tagsinput -->
    <script src="/assets/js/plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>

    <!-- jQuery Validation -->
    <script src="/assets/js/plugin/jquery.validate/jquery.validate.min.js"></script>

    <!-- Summernote -->
    <script src="/assets/js/plugin/summernote/summernote-lite.min.js"></script>

    <!-- Select2 -->
    <script src="/assets/js/plugin/select2/select2.full.min.js"></script>

    <!-- Sweet Alert -->
    <script src="/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- clock cdn -->
    <script src="https://cdn.lordicon.com/lordicon.js"></script>

    <!-- Owl Carousel -->
    <script src="/assets/js/plugin/owl-carousel/owl.carousel.min.js"></script>

    <!-- Magnific Popup -->
    <script src="/assets/js/plugin/jquery.magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Kaiadmin JS -->
    <script src="/assets/js/kaiadmin.creative.min.js"></script>

    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="/assets/js/setting-demo.js"></script>
    <!-- <script src="/assets/js/demo.js"></script> -->

    <script>
        $(window).on('load', function() {
            // Animate loader off screen
            init();
            $(".preloader-container").fadeOut("slow", function() {
                $(this).removeClass("d-flex");
            });
        });

        $('body').on('click', '.view-notification', function(event) {
            event.preventDefault();
            const id = $(this).data('notification-id');
            const href = $(this).attr('href');

            $.easyAjax({
                url: "https://demo.worksuite.biz/account/mark-read",
                type: "POST",
                data: {
                    '_token': "iS5P3mqvo93y1nXxAjQWzmjH6Do96ghaa61vDzjt",
                    'id': id
                },
                success: function() {
                    if (typeof href !== 'undefined') {
                        window.location = href;
                    }
                }
            });
        });

        $('body').on('click', '.img-lightbox', function() {
            const imageUrl = $(this).data('image-url');
            const url = "https://demo.worksuite.biz/front/show-image?image_url=" + encodeURIComponent(imageUrl);
            $(MODAL_XL + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_XL, url);
        });

        $('body').on('click', '.piechart-full-screen', function() {
            const chartData = JSON.stringify($(this).data('chart-data'));
            const chartId = $(this).data('chart-id');
            const url = "https://demo.worksuite.biz/front/show-piechart?chart_data=" + encodeURIComponent(
                chartData) + "&chart_id=" + chartId;
            $(MODAL_XL + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_XL, url);
        });

        function updateOnesignalPlayerId(userId) {
            $.easyAjax({
                url: 'https://demo.worksuite.biz/account/settings/profile/updateOneSignalId',
                type: 'POST',
                data: {
                    'userId': userId,
                    '_token': 'iS5P3mqvo93y1nXxAjQWzmjH6Do96ghaa61vDzjt'
                }
            })
        }

        if (SEARCH_KEYWORD !== '' && $('#search-text-field').length > 0) {
            $('#search-text-field').val(SEARCH_KEYWORD);
            $('#reset-filters').removeClass('d-none');
        }

        $('body').on('click', '.show-hide-purchase-code', function() {
            $('> .icon', this).toggleClass('fa-eye-slash fa-eye');
            $(this).siblings('span').toggleClass('blur-code ');
        });
    </script>

    <script>
        $('#datetime').datetimepicker({
            format: 'MM/DD/YYYY H:mm',
        });
        $('#datepicker').datetimepicker({
            format: 'MM/DD/YYYY',
        });
        $('#timepicker').datetimepicker({
            format: 'h:mm A',
        });

        $('#basic').select2({
            theme: "bootstrap"
        });

        $('#multiple').select2({
            theme: "bootstrap"
        });

        $('#multiple-states').select2({
            theme: "bootstrap"
        });

        $('#tagsinput').tagsinput({
            tagClass: 'badge-info'
        });
    </script>
    <script>
        $('#summernote').summernote({
            placeholder: 'kaiadmin',
            fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New'],
            tabsize: 2,
            height: 300
        });
    </script>