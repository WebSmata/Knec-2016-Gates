<?php
	session_start();
	require( 'js_config.php' );
	include JS_FUNC.'js_dbconn.php';
	require JS_FUNC.'js_base.php';
	include JS_FUNC.'js_options.php';
	include JS_FUNC.'js_paging.php';
	include JS_FUNC.'js_posting.php';
	include JS_FUNC.'js_employees.php';
 	
	include 'js_pages.php';
	
 	$js_loginid = isset( $_SESSION['gates_user'] ) ? $_SESSION['gates_user'] : "";
	
	$page = isset( $_GET['page'] ) ? $_GET['page'] : "";
	$myaccount = isset( $_SESSION['gates_account'] ) ? $_SESSION['gates_account'] : "";
	
if ( $page != "login" && $page != "logout" && $page != "register" 
			&& $page != "forgot_password" && $page != "recover_password"
			&& $page != "forgot_username" && $page != "recover_username"
			&& $page != "logout" && !$js_loginid ) {
			
			js_signin();
	   exit;
	} 
      
	  
  switch ( $page ) {
	case 'login': js_signin();
		break;
	case 'register': register();
		break;
	case 'forgot_password': forgot_password();
		break;
	case 'recover_password': recover_password();
		break;
	case 'forgot_username': forgot_username();
		break;
	case 'recover_username': recover_username();
		break;
	case 'logout': logout();
		break;
	case 'book_now':  ticket_new();
		break;
	case 'ticket_all': ticket_all();
		break;
	case 'ticket_view': ticket_view();
		break;
	case 'ticket_edit':  ticket_edit();
		break;
	case 'ticket_delete':  ticket_delete();
		break;
	case 'employee_all': employee_all();
		break;
	case 'employee_new':  employee_new();
		break;
	case 'employee_view': employee_view();
		break;
	case 'profile': 
		if ($myaccount) js_profile();
		break;
	case 'options':  js_options();
		break; 
	case 'booking':  js_booking();
		break;	
    default:
		js_booking();
}

function js_booking() {
	$results = array();
	$results['pageTitle'] = "Gates Ticketing System";
	$results['pageAction'] = "Dashboard"; 
	
	if ( isset( $_POST['BookNow'] ) ) {		
		js_add_new_ticket();	
		header( "Location: index.php?page=ticket_all");						
	}  else {	
		require( JS_INC . "js_homepage.php" );
	}
}

function js_options() {
	$results = array();
	$results['pageTitle'] = "Gates Ticketing System";
	$results['pageAction'] = "Options"; 
	$js_loginid = isset( $_SESSION['gates_user'] ) ? $_SESSION['gates_user'] : "";
	
	if ( isset( $_POST['SaveSite'] ) ) {
			
		js_set_option('sitename', $_POST['sitename'], $js_loginid);	
		js_set_option('keywords', $_POST['keywords'], $js_loginid);
		js_set_option('description', $_POST['description'], $js_loginid);
		js_set_option('siteurl', $_POST['siteurl'], $js_loginid);
		
		header( "Location: index.php?page=options");						
	}  else if ( isset( $_POST['CancelSave'] ) ) {
		header( "Location: index.php?page=options");						
	}  else {
		require( JS_INC . "js_options.php" );
	}
	
}

?>
