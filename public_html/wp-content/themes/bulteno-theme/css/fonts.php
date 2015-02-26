<?php
	header("Content-type: text/css");
	require_once('../../../../wp-load.php');

	$google_font_1 = get_option(THEME_NAME."_google_font_1");

?>

body {
	font-family: '<?php echo $google_font_1 ;?>', sans-serif;
}