<?php
function lf_format_price( $price ){
	$price = substr($price, 0, strpos($price, ".") + 3);
return str_replace( ",", ".", $price );
}
?>