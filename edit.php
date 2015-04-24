<?php
/* 
 EDIT.PHP
 Allows user to edit specific entry in database
*/

 // creates the edit record form
 // since this form is used multiple times in this file, I have made it a function that is easily reusable
 function renderForm($id, $building, $room, $manufacturer, $name, $model, $serialnumber, $servicecompany, $technician, $photo, $mfrslink, $notes, $error)
 {
 ?>
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
 <html>
<head>

	<!-- start bootstrap stuff -->
	<meta charset="utf-8"> <!-- These 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- These 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- These 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<link rel="stylesheet" href="http://www.appscafe.com/records/css/bootstrap.min.css"> <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" type="text/css" href="http://www.appscafe.com/records/css/material_theme.css" />
	<script src="http://www.appscafe.com/records/js/bootstrap.min.js"></script> <!-- Latest compiled and minified JavaScript -->

	<!-- end bootstrap stuff -->
	
	<script type="text/javascript">
		$(document).ready(function(){
			$("#myModal").modal('show');
		});
	</script>
	
</head>
<body>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog material_modal_dialog">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		<h4 class="modal-title" id="myModalLabel">Modal title</h4>
	  </div>
	  <div class="modal-body">
		WebGl generator is a component for creating original 3D models. You can use it to demonstrate various products and other things. In order to use generator first you need to create .OBJ file in any graphics editor such as 3D MAX or Blender. Then you can add this file in component's settings. show plugin →
	  </div>
	  <div class="modal-footer material_modal_footer">
		<button type="button" class="btn btn-default material_btn material_btn" data-dismiss="modal">Close</button>
		<button type="button" class="btn btn-primary material_btn material_btn_primary">Save changes</button>
	  </div>
	</div>
  </div>
</div>
	
    <!-- <div class="bs-example">
	

    <div id="myModal" class="modal fade">
        <div class="modal-dialog material_modal_dialog">
            <div class="modal-content">
                <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit Item</h4>
                </div>
                <div class="modal-body">
				<div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
  Please enter all required fields.
</div>
					<form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                    <div class="form-group">
                     <label class="control-label col-sm-3" for="id">Unique ID:</label><div class="col-sm-9"><input readonly type="text" name="id" id="id" class="form-control material_input" value="<?php echo $id; ?>"/><br/></div>
                     <label class="control-label col-sm-3" for="building">Building: <font color=red><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span></font></label><div class="col-sm-9"><input type="text" name="building" id="building" class="form-control material_input" value="<?php echo $building; ?>"/><br/></div>
                     <label class="control-label col-sm-3" for="room">Room: <font color=red><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span></font></label><div class="col-sm-9"><input type="text" name="room" id="room" class="form-control material_input" value="<?php echo $room; ?>"/><br/></div>		
                     <label class="control-label col-sm-3" for="manufacturer">Manufacturer: <font color=red><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span></font></label><div class="col-sm-9"><input type="text" name="manufacturer" id="manufacturer" class="form-control material_input" value="<?php echo $manufacturer; ?>"/><br/></div>
                     <label class="control-label col-sm-3" for="name">Name: <font color=red><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span></font></label><div class="col-sm-9"><input type="text" name="name" id="name" class="form-control material_input" value="<?php echo $name; ?>"/><br/></div>
                     <label class="control-label col-sm-3" for="model">Model: <font color=red><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span></font></label><div class="col-sm-9"><input type="text" name="model" id="model" class="form-control material_input" value="<?php echo $model; ?>"/><br/></div>
                     <label class="control-label col-sm-3" for="serialnumber">Serial Number: <font color=red><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span></font></label><div class="col-sm-9"><input type="text" name="serialnumber" id="serialnumber" class="form-control material_input" value="<?php echo $serialnumber; ?>"/><br/></div>
                     <label class="control-label col-sm-3" for="servicecompany">Service Company: <font color=red><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span></font></label><div class="col-sm-9"><input type="text" name="servicecompany" id="servicecompany" class="form-control material_input" value="<?php echo $servicecompany; ?>"/><br/></div>
                     <label class="control-label col-sm-3" for="technician">Technician: <font color=red><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span></font></label><div class="col-sm-9"><input type="text" name="technician" id="technician" class="form-control material_input" value="<?php echo $technician; ?>"/><br/></div>
                     <label class="control-label col-sm-3" for="photo">Photo:</label><div class="col-sm-9"><input type="file" name="photo" id="photo" class="form-control material_input" value="<?php echo $photo; ?>"/><br/></div>
                     <label class="control-label col-sm-3" for="mfrslink">Mfr's Link:</label><div class="col-sm-9"><input type="text" name="mfrslink" id="mfrslink" class="form-control material_input" value="<?php echo $mfrslink; ?>"/><br/></div>
                     <label class="control-label col-sm-3" for="notes">Notes:</label><div class="col-sm-9"><input type="text" name="notes" id="notes" class="form-control material_input" value="<?php echo $notes; ?>"/><br/></div>
					 <font color=red><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span></font> denotes a required field.
                    </div>
                </div>
                <div class="modal-footer material_modal_footer">
					<button type="button" class="btn btn-default material_btn material_btn" data-dismiss="modal">Close</button>
					<button type="reset" name="reset" class="btn btn-primary material_btn material_btn_primary"><span class='glyphicon glyphicon-refresh'></span> Reset</button>
					<a class="btn btn-danger material_btn material_btn_danger" role="button" href=delete.php?id=' . $row['id'] . '><span class='glyphicon glyphicon-remove'></span> Delete</a>							
					<button type="submit" name="submit" class="btn btn-success material_btn material_btn_success"><span class='glyphicon glyphicon-floppy-disk'></span> Save</button>


				                </div>
            </div>
        </div>
    </div>
</div>    --> 
</body>
 </html> 
 <?php
 }



 // connect to the database
 include('connect-db.php');
 
 // check if the form has been submitted. If it has, process the form and save it to the database
 if (isset($_POST['submit']))
 { 
 // confirm that the 'id' value is a valid integer before getting the form data
 if (is_numeric($_POST['id']))
 {
 // get form data, making sure it is valid
 $id = $_POST['id'];
 $building = mysql_real_escape_string(htmlspecialchars($_POST['building']));
 $room = mysql_real_escape_string(htmlspecialchars($_POST['room']));
 $manufacturer = mysql_real_escape_string(htmlspecialchars($_POST['manufacturer']));
 $name = mysql_real_escape_string(htmlspecialchars($_POST['name']));
 $model = mysql_real_escape_string(htmlspecialchars($_POST['model']));
 $serialnumber = mysql_real_escape_string(htmlspecialchars($_POST['serialnumber']));
 $servicecompany = mysql_real_escape_string(htmlspecialchars($_POST['servicecompany']));
 $technician = mysql_real_escape_string(htmlspecialchars($_POST['technician']));
 $photo = mysql_real_escape_string(htmlspecialchars($_POST['photo']));
 $mfrslink = mysql_real_escape_string(htmlspecialchars($_POST['mfrslink']));
 $notes = mysql_real_escape_string(htmlspecialchars($_POST['notes']));
 
 // check that all fields are filled in
 if ($building == '' || $room == '' || $manufacturer == '' || $name == '' || $model == '' || $serialnumber == '' || $servicecompany == '' || $technician == '' || $photo == '' || $mfrslink == '' || $notes == '')
 {
 // generate error message
 $error = 'ERROR: Please fill in all required fields!';
 
 //error, display form
 renderForm($id, $building, $room, $manufacturer, $name, $model, $serialnumber, $servicecompany, $technician, $photo, $mfrslink, $notes, $error);
 }
 else
 {
 // save the data to the database
 mysql_query("UPDATE records SET building='$building', room='$room', manufacturer='$manufacturer', name='$name', model='$model', serialnumber='$serialnumber', servicecompany='$servicecompany', technician='$technician', photo='$photo', mfrslink='$mfrslink', notes='$notes' WHERE id='$id'")
 or die(mysql_error()); 
 
 // once saved, redirect back to the view page
 header("Location: index.php"); 
 //header("refresh: 1;");
 }
 }
 else
 {
 // if the 'id' isn't valid, display an error
 echo 'Error!';
 }
 }
 else
 // if the form hasn't been submitted, get the data from the db and display the form
 {
 
 // get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)
 if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
 {
 // query db
 $id = $_GET['id'];
 $result = mysql_query("SELECT * FROM records WHERE id=$id")
 or die(mysql_error()); 
 $row = mysql_fetch_array($result);
 
 // check that the 'id' matches up with a row in the databse
 if($row)
 {
 
 // get data from db
 $building = $row['building'];
 $room = $row['room'];
 $manufacturer = $row['manufacturer'];
 $name = $row['name'];
 $model = $row['model'];
 $serialnumber = $row['serialnumber'];
 $servicecompany = $row['servicecompany'];
 $technician = $row['technician'];
 $photo = $row['photo'];
 $mfrslink = $row['mfrslink'];
 $notes = $row['notes'];

 
 // show form
 renderForm($id, $building, $room, $manufacturer, $name, $model, $serialnumber, $servicecompany, $technician, $photo, $mfrslink, $notes, '');
 }
 else
 // if no match, display result
 {
 echo "No results!";
 }
 }
 else
 // if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error
 {
 echo 'Error!';
 }
 }
?>
