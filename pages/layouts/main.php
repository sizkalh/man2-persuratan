<?php
	if(file_exists('pages/contents/'.$folder.'/'.$page)){
		$include=$folder.$page;
		include('pages/contents/'.$include);
	}else{
		include('pages/layouts/404.php');
	}
?>