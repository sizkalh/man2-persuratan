<?php 
    date_default_timezone_set("Asia/Jakarta"); 
	@session_start();	
    include_once('config/database.php');
    include_once('library/helper.php');

    $uri = explode('?', trim($_SERVER['REQUEST_URI'], '/'));
	$uri = explode('/', trim($uri[0], '/'));
	$tot_uri = count($uri);
	// echo $tot_uri;
	$folder = '';
	if ($tot_uri >= 2) {
		for ($i=0; $i < ($tot_uri-1); $i++) {
			$folder .= $uri[$i].'/';
		}
	}
	if ($page = end($uri)) {
		$page = $page.'.php';		
	} else {
		$page = 'index.php';
	}

	$page_uri = $_SERVER['REQUEST_URI'];
	$uri2 = explode('/', trim($uri[0], '/'));
	// echo $_SERVER['REQUEST_URI'];
	if($page_uri != '/auth'){	
		if($uri2[0] != 'process'){
			include_once('pages/layouts/header.php');
			include_once('pages/layouts/navbar.php');
			include_once('pages/layouts/sidebar.php');
			include_once('pages/layouts/main.php');
			include_once('pages/layouts/footer.php');
		}		
	}else{
		include_once('pages/layouts/auth.php');
	}
?>