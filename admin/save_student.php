<?php
include('dbcon.php');

               $ps = $_POST['ps'];
               $un = $_POST['un'];
               $fn = $_POST['fn'];
               $ln = $_POST['ln'];
			   $class_id = $_POST['class_id'];
			   
               mysql_query("insert into student (password,username,firstname,lastname,location,class_id,status)
		values ('$ps','$un','$fn','$ln','uploads/NO-IMAGE-AVAILABLE.jpg','$class_id','registered')                                    
		") or die(mysql_error()); ?>
<?php    ?>