<script src="public/assets/vendor/global/global.min.js"></script>
<script src="public/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="public/assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>

<script src="public/assets/vendor/chart.js/Chart.bundle.min.js"></script>
<script src="public/assets/vendor/apexchart/apexchart.js"></script>
<script src="public/assets/vendor/peity/jquery.peity.min.js"></script>
<script src="public/assets/vendor/swiper/js/swiper-bundle.min.js"></script>
<script src="public/assets/js/dashboard/dashboard-1.js"></script>
<script src="public/assets/vendor/wow-master/dist/wow.min.js"></script>
<script src="public/assets/vendor/bootstrap-datetimepicker/js/moment.js"></script>
<script src="public/assets/vendor/datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="public/assets/vendor/bootstrap-select-country/js/bootstrap-select-country.min.js"></script>

<script src="public/assets/vendor/jquery-validation/jquery.validate.min.js"></script>
<script src="public/assets/js/plugins-init/jquery.validate-init.js"></script>

<script src="public/assets/js/custom.min.js"></script>
<script src="public/assets/js/dlabnav-init.js"></script>
<script src="public/assets/js/demo.js"></script>
<script>
    $(function() {
        $("#datepicker").datepicker({
            autoclose: true,
            todayHighlight: true
        }).datepicker('update', new Date());
    });

    $(document).ready(function() {
        $(".booking-calender .fa.fa-clock-o").removeClass(this);
        $(".booking-calender .fa.fa-clock-o").addClass('fa-clock');
    });
    jQuery(document).ready(function() {
        setTimeout(function() {
            dlabSettingsOptions.version = 'light';
            new dlabSettings(dlabSettingsOptions);
        }, 1500)
    });
    $('.my-select').selectpicker();
</script>