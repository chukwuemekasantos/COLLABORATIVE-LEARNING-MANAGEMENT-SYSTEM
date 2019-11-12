
  
<!doctype html>
<html>
    <head>
    <style>






.button{
    border-radius:3px;
    border:0px;
    background-color:mediumpurple;
    color:white;
    padding:10px 20px;
    letter-spacing: 1px;
}


	
	</style>
        <title></title>
        <link href="style.css" type="text/css" rel="stylesheet">
        <script src="jquery-1.12.0.min.js" type="text/javascript"></script>
        <script src="script.js" type="text/javascript"></script>
        <?php
         

            $row = 0;

            // number of rows per page
            $rowperpage = 1;
            if(isset($_POST['num_rows'])){
                $rowperpage = $_POST['num_rows'];
            }

            // Previous Button
            if(isset($_POST['but_prev'])){
                $row = $_POST['row'];
                $row -= $rowperpage;
                if( $row < 0 ){
                    $row = 0;
                }
            }

            // Next Button
            if(isset($_POST['but_next'])){
                $row = $_POST['row'];
                $allcount = $_POST['allcount'];

                $val = $row + $rowperpage;
                if( $val < $allcount ){
                    $row = $val;
                }
            }
        ?>
    </head>
    <body>
    <div class="container">
 
            
            <?php
            // count total number of rows
            $sql = "SELECT COUNT(*) AS Class FROM subject";
            $result = mysql_query($sql);
            $fetchresult = mysql_fetch_array($result);
            $allcount = $fetchresult['Class'];

if(isset($_GET['id'])){

$page_id_content = $_GET['id'];
$sql = "UPDATE subject SET Course_Start='Started' WHERE subject_code='$page_id_content'";
mysql_query($sql);
	

            // selecting rows
            $sql = "SELECT * FROM  course_content where subject_code='$page_id_content' ORDER BY subject_code ASC limit $row,".$rowperpage;
            $result = mysql_query($sql);
            $sno = $row + 1;

            while($fetch = mysql_fetch_array($result)){
                $course_id = $fetch['course_id'];
                $subject_code = $fetch['subject_code'];
				$Course_Title = $fetch['Course_Title'];
				$Course_Contents = $fetch['Course_Contents'];
				if ($subject_code == $page_id_content){
					$Student_Names= $fname.' '.$lname;

$query_kp = mysql_query("select Course_Title from course_completiondb where Course_Title='$Course_Title'")or die(mysql_error());
$count = mysql_num_rows($query_kp);

if ($count!=0){
echo "<script>alert(\"Wel\")</script>";
}else{
echo "<script>alert(\"Welcome to Delta State University Abraka!\" + '\n' + ''\"Welcome to Delta State University Abraka!\")</script>";	
$query = mysql_query("insert into course_completiondb (Course_Code,Course_Title,Studnets_Name) values('$subject_code','$Course_Title','$Student_Names')")or die(mysql_error());
	while($fetch_P = mysql_fetch_array($query_kp)){
                $course_id = $fetch_P['course_id'];
                $Course_Code = $fetch_P['Course_Code'];
				$Course_Titles = $fetch_P['Course_Title'];
				$Studnets_Name = $fetch_P['Studnets_Name'];
				$Course_Start = $fetch_P['Course_Start'];
				$Course_End = $fetch_P['Course_End'];
				$Status = $fetch_P['Status'];
if ($Course_Code =$page_id_content && $Course_Titles && $Studnets_Name && $Course_Start ){
					
					$sql = "UPDATE subjects SET Course_Start='Started' WHERE subject_code='$page_id_content'";
mysql_query($sql);
					
				}
}		
}


                ?>
               
                <div style="width:75%; border:dashed #000099 thick; padding:20px;">
                <p><h3><a href="pages.php?"><strong><u><?php echo $Course_Title; ?></u></strong>&nbsp; &gt;&gt;</a></h3></p>

                 <p align="justify"><?php echo $Course_Contents; ?></p>
      
	
	  
	     <?php
			
					echo $Student_Names;
				}elseif($subject_code =""){
					echo"no go back";
				}
                $sno ++;
				

            }
}else{
	echo"no go back";
}
            ?>
        
        <!-- Pagination control -->
        <form method="post" action="" id="form">
            <div id="div_pagination">
                <input type="hidden" name="row" value="<?php echo $row; ?>">
                <input type="hidden" name="allcount" value="<?php echo $allcount; ?>">
                <hr style=" height:2%; background-color:#006;">
                <p>
                <input type="submit" class="button" name="but_prev" value="Previous">
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; 
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; 
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                <input type="submit" class="button" name="but_next" value="Next">
</p>
             <hr style=" height:2%; background-color:#006;">  
        </form>
         
</div>

    </div>
    </body>
</html>
