



<?php
//including the database connection file
include_once("classes/Database.php");

$database = new Database();
	$name = $_POST['name'];
	$check_var=0;
	$result = $database->getData("SELECT manufacturer_name FROM manufacturer");
	if($result!=null)
	{
	foreach ($result as $key => $res) {	
		if(strtolower($name)==strtolower($res['manufacturer_name']))
		{
			$check_var=1;
			//match found. Manufacturer name already exist
		}
	}
	}
	if($check_var==0)
	{
	$result = $database->execute("INSERT INTO `manufacturer` (`manufacturer_name`) VALUES ('$name')");
	echo "Inserted Succefully ";
	}
	else
		echo "Manufacturer name already exist !";
	
?>