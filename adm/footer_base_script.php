		<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
		<!-- BEGIN CORE PLUGINS -->
		<!--[if lt IE 9]>
		<script src="<?php echo($site_home); ?>/assets/global/plugins/respond.min.js"></script>
		<script src="<?php echo($site_home); ?>/assets/global/plugins/excanvas.min.js"></script> 
		<![endif]-->
		<script src="<?php echo($site_home); ?>/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
		<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
		<script src="<?php echo($site_home); ?>/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
		<script src="<?php echo($site_home); ?>/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="<?php echo($site_home); ?>/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
		<script src="<?php echo($site_home); ?>/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
		<script src="<?php echo($site_home); ?>/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
		<script src="<?php echo($site_home); ?>/assets/global/plugins/jquery.cookie.min.js" type="text/javascript"></script>
		<script src="<?php echo($site_home); ?>/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
		<script src="<?php echo($site_home); ?>/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
		<!-- END CORE PLUGINS -->
		<!-- BEGIN: Page level plugins -->
		<script src="<?php echo($site_home); ?>/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script>
		<script src="<?php echo($site_home); ?>/assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
		<script src="<?php echo($site_home); ?>/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
		<!-- BEGIN:File Upload Plugin JS files-->
		<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
		<script src="<?php echo($site_home); ?>/assets/global/plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js"></script>
		<!-- The Templates plugin is included to render the upload/download listings -->
		<script src="<?php echo($site_home); ?>/assets/global/plugins/jquery-file-upload/js/vendor/tmpl.min.js"></script>
		<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
		<script src="<?php echo($site_home); ?>/assets/global/plugins/jquery-file-upload/js/vendor/load-image.min.js"></script>
		<!-- The Canvas to Blob plugin is included for image resizing functionality -->
		<script src="<?php echo($site_home); ?>/assets/global/plugins/jquery-file-upload/js/vendor/canvas-to-blob.min.js"></script>
		<!-- blueimp Gallery script -->
		<script src="<?php echo($site_home); ?>/assets/global/plugins/jquery-file-upload/blueimp-gallery/jquery.blueimp-gallery.min.js"></script>
		<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
		<script src="<?php echo($site_home); ?>/assets/global/plugins/jquery-file-upload/js/jquery.iframe-transport.js"></script>
		<!-- The basic File Upload plugin -->
		<script src="<?php echo($site_home); ?>/assets/global/plugins/jquery-file-upload/js/jquery.fileupload.js"></script>
		<!-- The File Upload processing plugin -->
		<script src="<?php echo($site_home); ?>/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-process.js"></script>
		<!-- The File Upload image preview & resize plugin -->
		<script src="<?php echo($site_home); ?>/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-image.js"></script>
		<!-- The File Upload audio preview plugin -->
		<script src="<?php echo($site_home); ?>/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-audio.js"></script>
		<!-- The File Upload video preview plugin -->
		<script src="<?php echo($site_home); ?>/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-video.js"></script>
		<!-- The File Upload validation plugin -->
		<script src="<?php echo($site_home); ?>/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-validate.js"></script>
		<!-- The File Upload user interface plugin -->
		<script src="<?php echo($site_home); ?>/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-ui.js"></script>
		<!-- The main application script -->
		<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
		<!--[if (gte IE 8)&(lt IE 10)]>
		    <script src="<?php echo($site_home); ?>/assets/global/plugins/jquery-file-upload/js/cors/jquery.xdr-transport.js"></script>
		<![endif]-->
		<!-- END:File Upload Plugin JS files-->
		<!-- END: Page level plugins -->
		<script src="<?php echo($site_home); ?>/assets/global/scripts/metronic.js" type="text/javascript"></script>
		<script src="<?php echo($site_home); ?>/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
		<script src="<?php echo($site_home); ?>/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
		<script src="<?php echo($site_home); ?>/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
		<script src="<?php echo($site_home); ?>/assets/admin/pages/scripts/inbox.js" type="text/javascript"></script>
		<script>
			jQuery(document).ready(function() {       
				// initiate layout and plugins
				Metronic.init(); // init metronic core components
				Layout.init(); // init current layout
				QuickSidebar.init(); // init quick sidebar
				Demo.init(); // init demo features
				Inbox.init();
			});
		</script>
		<!-- END JAVASCRIPTS -->
