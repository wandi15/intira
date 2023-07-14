    <script src="./assets_admin/plugins/jquery/jquery-1.9.1.min.js"></script>
	<script src="./assets_admin/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
	<script src="./assets_admin/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
	<script src="./assets_admin/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!--[if lt IE 9]>
		<script src="./assets_admin/crossbrowserjs/html5shiv.js"></script>
		<script src="./assets_admin/crossbrowserjs/respond.min.js"></script>
		<script src="./assets_admin/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="./assets_admin/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="./assets_admin/plugins/jquery-cookie/jquery.cookie.js"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->


	<script src="./assets_admin/plugins/DataTables/media/js/jquery.dataTables.js"></script>
	<script src="./assets_admin/plugins/DataTables/media/js/dataTables.bootstrap.min.js"></script>
	<script src="./assets_admin/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
    <script src="./assets_admin/js/table-manage-responsive.demo.min.js"></script>
	<script src="./assets_admin/plugins/parsley/dist/parsley.js"></script>

	<script src="./assets_admin/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="./assets_admin/plugins/ionRangeSlider/js/ion-rangeSlider/ion.rangeSlider.min.js"></script>
	<script src="./assets_admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
	<script src="./assets_admin/plugins/masked-input/masked-input.min.js"></script>
	<script src="./assets_admin/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
	<script src="./assets_admin/plugins/password-indicator/js/password-indicator.js"></script>
	<script src="./assets_admin/plugins/bootstrap-combobox/js/bootstrap-combobox.js"></script>
	<script src="./assets_admin/plugins/bootstrap-select/bootstrap-select.min.js"></script>
	<script src="./assets_admin/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
	<script src="./assets_admin/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.js"></script>
	<script src="./assets_admin/plugins/jquery-tag-it/js/tag-it.min.js"></script>
    <script src="./assets_admin/plugins/bootstrap-daterangepicker/moment.js"></script>
    <script src="./assets_admin/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="./assets_admin/plugins/select2/dist/js/select2.min.js"></script>
    <script src="./assets_admin/plugins/bootstrap-eonasdan-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
	<script src="./assets_admin/js/form-plugins.demo.js"></script>
	<script src="./assets_admin/js/ui-modal-notification.demo.min.js"></script>
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="./assets_admin/plugins/ckeditor/ckeditor.js"></script>
	<script src="./assets_admin/plugins/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
	<script src="./assets_admin/plugins/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js"></script>
	<script src="./assets_admin/js/form-wysiwygx.demo.js"></script>
	<script src="./assets_admin/js/math.min.js"></script>

		<script src="./assets_admin/plugins/bootstrap-wizard/js/bwizard.js"></script>
	<script src="./assets_admin/js/form-wizards.demo.min.js"></script>


		<script src="./assets_admin/plugins/switchery/switchery.min.js"></script>
	
	<script src="./assets_admin/js/form-slider-switcher.demo.js"></script>


	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="./assets_admin/ardi/accounting.min.js"></script>
	
	<script src="./assets_admin/js/apps.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
			TableManageResponsive.init();
			FormPlugins.init();
			Notification.init();
			FormWysihtml5.init();
			FormWizard.init();
			FormSliderSwitcher.init();
			
		});
	</script>


	<script type="text/javascript">
		var table = $('#example').DataTable();

$('#mass_select_all').click(function(event) { //on click

var checked = this.checked;

table.column(0).nodes().to$().each(function(index) {

if (checked) {

$(this).find('.checkbox').prop('checked', 'checked');

} else {

$(this).find('.checkbox').removeProp('checked');

}

});
	</script>