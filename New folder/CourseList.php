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
                                    
                            
                            <table cellpadding="0" cellspacing="0" border="0" class="table" id="">
                            <thead>
                            <style type="text/css">
							th{color:#FFF;
							background-color:#33C}
							table{
								background-color:#F8E4E6;
								color:#000;}
							#btn{
								background-image:url(admin/images/Start-button.jpg);
								width:100px;
								height:30px;}
								
								 input[type=submit]:active{
      background-color: black;
     }
      input[type=submit]:focus {
    background-color: black;
  }
								
							</style>
                            
 
                            
                         
<tr>
												<th></th>
                                                <th>Course Code</th>
                                                <th>Description</th>
												<th>Date Upload</th>
												<th>Action</th>
                                                
					
												<th></th>
												</tr>
										</thead>
										<tbody>
                                                   
                                                   <?php $query = mysql_query("select * from teacher_class_student
														LEFT JOIN teacher_class ON teacher_class.teacher_class_id = teacher_class_student.teacher_class_id 
														LEFT JOIN class ON class.class_id = teacher_class.class_id 
														LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
														LEFT JOIN teacher ON teacher.teacher_id = teacher_class.teacher_id
														where student_id = '$session_id' and school_year = '$school_year'
														")or die(mysql_error());
														$count = mysql_num_rows($query);
									?><?php
														if ($count != '0'){
														while($row = mysql_fetch_array($query)){
														$id = $row['teacher_class_id'];
														$Class_Name = $row['class_name'];	
													?>
                                                   
                                                                <?php
										
										
                                        $query = mysql_query("select * from subject where Class = '$Class_Name' ORDER BY Class DESC") or die(mysql_error());
				$count = mysql_num_rows($query);
	while ($row = mysql_fetch_array($query)) {
		$id = $row['subject_id'];
		$subject_title = $row['subject_title'];
		
		?>								<form action="" method="post">        
                                        <tr id="del">
										<td width="30">
				
										</td>
										 <td><?php echo $row['subject_code']; ?></td>
                                         <td><?php echo $row['subject_title']; ?> </td>
                                         <td>2018 &nbsp; &nbsp;</td>                                     
                                         
                                          <?php 
if(isset($_POST["start_course"])){
	
	$select_subject = "select * from subject where subject_title='$subject_title' ORDER BY Class DESC";
$run_subject = mysql_query($select_subject);
while($row_subject=mysql_fetch_array($run_subject)){
	
	$subject_id = $row_subject['subject_id'];
	$subject_code = $row_subject['subject_code'];
	$subject_titles = $row_subject['subject_title'];
	$Course_Content = substr($row_subject['subject_content'],0,300);
	



	
?>
                                         
              <input type="button"  onclick="window.location.href='pages.php?id=<?php echo $subject_id;?>'" id="btn" />                           
                                         
<td width="30"> <a href="pages.php?id=<?php echo $subject_id;?> " >Read more</a><p></p>
 <?php }} ?>                 
                                     <input name="start_course" id="btn" onclick="window.location.href='pages.php?id=<?php echo $subject_id;?> '" type="submit" value=""></td>                       
                                       
                                       

       
                                         
                                         
                        
                         </div>          
                                         
                                         
                           
                                         
                                         
                                                        
										</tr>
									
                                    <?php }}?>
                                   
                                    <?php }?>
                                   <tr>
                                   </form>
                                    <div >
                                    
                                    <p style="color:#FFF; font:Georgia, 'Times New Roman', Times, serif; font-size:18px;"><strong>  Congratulations! You have:</strong> &nbsp; <?php echo  $count?> Compulsory Course to Study
                                    </div>
                                    
                                   </tr>
										</tbody>
                                       
									</table>
                                    <div >
                                     <center>  


<?php echo $display;?>


</center>
                                    <p style="color:#FF0; font:Georgia, 'Times New Roman', Times, serif; font-size:14px;"><strong>  Note: All courses most be completed before attempting your final examination</strong> &nbsp; <?php echo $row['semester']; ?>
                                    
                                    </div>
                            </div>
                            
                            
                            <div class="block-content collapse in">
                                <div class="span12">
							<div class="pull-right">
								Check All <input type="checkbox"  name="selectAll" id="checkAll" />
								<script>
								$("#checkAll").click(function () {
									$('input:checkbox').not(this).prop('checked', this.checked);
								});
								</script>					
							</div>
								<?php
								$query_backpack = mysql_query("select * FROM student_backpack where student_id = '$session_id'  order by fdatein DESC ")or die(mysql_error());
								$num_row = mysql_num_rows($query_backpack);
								if ($num_row > 0){
								?>
									<form action="delete_backpack.php" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="">
									<a data-toggle="modal" href="#backup_delete" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"></i></a>
									<?php include('modal_backpack_delete.php'); ?>
										<thead>
										        <tr>
												<th></th>
												<th>Date Upload</th>
												<th>File Name</th>
												<th>Description</th>
												<th></th>
												</tr>
                                                
										</thead>
										<tbody>
                              		<?php
										$query = mysql_query("select * FROM student_backpack where student_id = '$session_id'  order by fdatein DESC ")or die(mysql_error());
										while($row = mysql_fetch_array($query)){
										$id  = $row['file_id'];
									?>                              
										<tr id="del<?php echo $id; ?>">
										<td width="30">
											<input id="" class="" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
										</td>
										 <td><?php echo $row['fdatein']; ?></td>
                                         <td><?php  echo $row['fname']; ?></td>
                                         <td><?php echo $row['fdesc']; ?></td>                                      
                                         <td width="30"><a href="<?php echo $row['floc']; ?>"><i class="icon-download icon-large"></i></a></td>                                      
										</tr>
									<?php } ?>
										</tbody>
									</table>
									</form>
									<?php }else{ ?>
									<div class="alert alert-info"><i class="icon-info-sign"></i> No Files Inside Your Backpack.</div>
									<?php } ?>
                                    
                                </div>
                            </div>
                          
                         
                            
                            
                        </div>
                        <!-- /block -->
                    </div>
                </div>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>
</html>

 