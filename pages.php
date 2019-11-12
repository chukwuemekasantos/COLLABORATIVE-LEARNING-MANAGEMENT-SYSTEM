<html>
	<head>
		<title>COEIKWO Learning Platform</title>
		
<link rel="stylesheet" href="style.css" media="all">
	</head>
	<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<body>
<?php include('navbar_student.php'); ?>
 <div class="container-fluid">
            <div class="row-fluid">
				<?php include('backpack_sidebar.php'); ?>
                <div class="span9" id="content">
                     <div class="row-fluid">
					    <!-- breadcrumb -->	
									<ul class="breadcrumb">
										<?php
										$school_year_query = mysql_query("select * from school_year order by school_year DESC")or die(mysql_error());
										$school_year_query_row = mysql_fetch_array($school_year_query);
										$school_year = $school_year_query_row['school_year'];
										?>
											<li><a href="#"><b>My Class</b></a><span class="divider">/</span></li>
										<li><a href="#">School Year: <?php echo $school_year_query_row['school_year']; ?></a><span class="divider">/</span></li>
										<li><a href="#"><b>Backpack</b></a></li>
									</ul>
						 <!-- end breadcrumb -->
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-right">Semester Class</div>
                            </div>
                            
                            <div class="block-content collapse in" style="background-color:#066"> 
                            
                            <?php $query = mysql_query("select * from teacher_class_student
														LEFT JOIN teacher_class ON teacher_class.teacher_class_id = teacher_class_student.teacher_class_id 
														LEFT JOIN class ON class.class_id = teacher_class.class_id 
														LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
														LEFT JOIN teacher ON teacher.teacher_id = teacher_class.teacher_id
														where student_id = '$session_id' and school_year = '$school_year'
														")or die(mysql_error());
														$count = mysql_num_rows($query);
									?>
                                    
<div id="pages" style="background-color:#FFF;">


<div style="width:20%">
 <?php include("Course_Pagination/index.php")?>
 </div>
<p>
</div>


</div>



<div id="footer">
<p align="center" ><font color="gray">&copy 2019: Degree Final Year Project. Designed by Emenike Chinedu E.</font></p>


</div>




</body>
</html>