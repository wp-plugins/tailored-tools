<?php
// Load as Javascript
header('Content-Type: application/javascript');
// Prepare our DB connections & actions/filters
require_once('../../../../wp-load.php');

?>
//alert('DEBUG: Tailored Tools MCE JS loaded');
(function() {
	tinymce.PluginManager.add('tailored_tools', function(editor, url) {
		editor.addButton('tailored_tools', {
			type:		'menubutton',
			tooltip:	'Tailored Tools Extras',
			menu:		[
				<?php
				$buttons = apply_filters('tailored_tools_mce_buttons', array());
				foreach ($buttons as $button) {
					echo "\n".'{ text:"'.$button['label'].'", onclick: function() {editor.insertContent("'.$button['shortcode'].'");} },';
				}
				?>
			],
		});

	});
})();

