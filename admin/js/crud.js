function deleteR(id,tb){
	var tr = $('#' + id);  
	tr.css("background-color","#FF3700"); // console.log(id);console.log(tb);

	if (confirm("Are you sure you want to delete this?")) {
		$.post( "c_Delete.php?sql_table="+tb+"&id="+id );
		tr.remove();
	    // console.log(id);
	} else {
	    // tr.removeAttr( 'background-color' );
	    tr.css("background-color","");		    	
	    false;
	}   

	// $(this).parent().load("<?php echo $this_container; ?>");*/

} 