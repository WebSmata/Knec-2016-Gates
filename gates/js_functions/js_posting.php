<?php
	// POSTING FUNCTIONS
	// Begin Posting Functions 
	
	function js_slug_this($content) {
		return preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "-", strtolower($content)));
	}
	
	function js_slug_is(){
		if(empty($_POST['slug'])) {
		    $js_slug = trim($_POST['slug']);
		} else $js_slug = js_slug_this($_POST['title']);
		
	}
		
	function js_add_admin($admin_username) {		
		$database = new Js_Dbconn();	
		$Update_Admin_Details = array(
			'employee_group' => trim($_POST['admin_role']),
		);
		$where_clause = array('employee_name' => $admin_username);
		$updated = $database->js_update( 'js_employee', $Update_Admin_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
 		
	function js_add_new_bus(){		
		$database = new Js_Dbconn();			
		$New_Bus_Details = array(	
			'bus_busno' => trim($_POST['busno']),
			'bus_regno' => trim($_POST['regno']),
			'bus_seats' => trim($_POST['seats']),
			'bus_driver' => trim($_POST['driver']),
			'bus_created' => date('Y-m-d H:i:s'),
			'bus_createdby' => "1",
		);
			
		$add_query = $database->js_insert( 'js_bus', $New_Bus_Details ); 
	}
	
		
	function js_add_new_place(){		
		$database = new Js_Dbconn();			
		$New_Place_Details = array(	
			'place_title' => trim($_POST['title']),
			'place_created' => date('Y-m-d H:i:s'),
			'place_createdby' => "1",
		);
			
		$add_query = $database->js_insert( 'js_place', $New_Place_Details ); 
	}
	//bus, pagefrom, pageto, depature, pass, seat, customer, mobile, amount, payment	
	function js_add_new_ticket(){
		
		$database = new Js_Dbconn();			
		$New_Item_Details = array(
			'ticket_customer' => trim($_POST['customer']),
			'ticket_mobile' => trim($_POST['mobile']),
			'ticket_date' => trim($_POST['date']),
			'ticket_type' => trim($_POST['type']),
			'ticket_stand' => trim($_POST['stand']),
			'ticket_booking' => trim($_POST['booking']),
			'ticket_amount' => trim($_POST['amount']),
			'ticket_payment' => trim($_POST['payment']),
		    'ticket_posted' => date('Y-m-d H:i:s'),
		    'ticket_postedby' => "1",
		);
			
		$add_query = $database->js_insert( 'js_ticket', $New_Item_Details ); 
	}
	
	function js_edit_ticket($ticketid) {
		$database = new Js_Dbconn();	
		$Update_Item_Details = array(
			'ticket_customer' => trim($_POST['customer']),
			'ticket_mobile' => trim($_POST['mobile']),
			'ticket_date' => trim($_POST['date']),
			'ticket_type' => trim($_POST['type']),
			'ticket_stand' => trim($_POST['stand']),
			'ticket_booking' => trim($_POST['booking']),
			'ticket_amount' => trim($_POST['amount']),
			'ticket_payment' => trim($_POST['payment']),
		);
		$where_clause = array('ticketid' => $ticketid);
		$updated = $database->js_update( 'js_ticket', $Update_Item_Details, $where_clause, 1 );
		if( $updated )	{	}
	}
	
?>