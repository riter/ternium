$(document).ready(function() {
	var opts = {
		cssClass : 'el-rte',
		height   : 300,
		toolbar  : 'normal',
		cssfiles : ['/admin-assets/plugins/elrte/css/elrte-inner.css'], 
		fmAllow: true, 
		fmOpen : function(callback) {
			$('<div id="myelfinder"></div>').elfinder({
				url : '/admin-assets/plugins/elfinder/connectors/php/connector.php', 
				lang : 'en', 
				height: 300, 
				dialog : { width : 640, modal : true, title : 'Select Image' }, 
				closeOnEditorCallback : true,
				editorCallback : callback
			});
		}
	};
	$('#elrte').elrte(opts);
    $('#elrte-1').elrte(opts);
    $('#elrte-2').elrte(opts);
});