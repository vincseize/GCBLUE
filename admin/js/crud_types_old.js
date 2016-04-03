function showEditBox_type(id) {
	$('#frmAdd').hide();
	var currentMessage = $("#message_" + id + " .message-content").html();
	var editMarkUp = '<textarea rows="5" cols="80" id="txtmessage_'+id+'">'+currentMessage+'</textarea><button name="ok" onClick="callCrudAction(\'edit\','+id+')">Save</button><button name="cancel" onClick="cancelEdit(\''+currentMessage+'\','+id+')">Cancel</button>';
	$("#message_" + id + " .message-content").html(editMarkUp);
}
function cancelEdit_type(message,id) {
	$("#message_" + id + " .message-content").html(message);
	$('#frmAdd').show();
}
function callCrudAction_type(action,id) {
	$("#loaderIcon").show();
	var queryString;
	switch(action) {



		case "add":
					
			// alert("callCrudAction_type");


			var confirmRes = 'TRUE'; 

			var name_type = $("#name_type").val(); // *
			var color = $("#color").val();
			var txtmessage = $("#txtmessage").val();

			// alert(color);

				if (!name_type.trim()) {
					var confirmRes = 'FALSE'; 
					
				}
				else {
					queryString = 'action='+action+'&name_type='+ $("#name_type").val() +'&description='+ $("#txtmessage").val() + '&color='+ $("#color").val();
				}

		break;




		case "edit":
			queryString = 'action='+action+'&type_id='+ id + '&description='+ $("#txtmessage_"+id).val();
		break;
		case "delete":
			// alert(id);
			//queryString = 'action='+action+'&type_id='+ id;

				var confirmRes = 'FALSE'; 
				var type_nom = $("#type-content-"+id).html()
			    if (confirm("Are you sure to delete Type "+ type_nom +"?")) {
			    	var confirmRes = 'TRUE';  	
					queryString = 'action='+action+'&type_id='+ id;
					// break;
					
					}


		break;
	}	



	jQuery.ajax({
	url: "crud_action_types.php",
	data:queryString,
	type: "POST",
	success:function(data){
		switch(action) {

			case "add":

				if (!name_type.trim()) {
					var confirmRes = 'FALSE'; 
					// alert(confirmRes);
				}
				else {

					$("#comment-list-box").append(data);
					location.reload();

				}

					// $("#message_" + id + " .message-content").html(data);
					// $('#frmAdd').show();
					
					//var r = setTimeout(window.location.reload.bind(window.location), 1000);
					// var r = window.location. reload;
					// r();


			break;






			case "edit":
				$("#type_" + id + " .message-content").html(data);
				$('#frmAdd').show();
			break;


			case "delete":
				location.reload();

			break;
		}



		$("#txtmessage").val('');
		$("#loaderIcon").hide();
	},
	error:function (){}
	});
}