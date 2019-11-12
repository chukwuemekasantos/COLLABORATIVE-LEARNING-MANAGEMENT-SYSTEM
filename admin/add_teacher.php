   <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Add Teacher</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post">
									
										
									 <div class="control-group">
											<label>Department:</label>
                                          <div class="controls">
                                            <select name="department"  class="" required>
                                             	<option selected="selected">...select...</option>
											<?php
											$query = mysql_query("select * from department order by department_name");
											while($row = mysql_fetch_array($query)){
											
											?>
											<option value="<?php echo $row['department_id']; ?>"><?php echo $row['department_name']; ?></option>
											<?php } ?>
                                            </select>
                                          </div>
                                        </div>
										<label>Firstname:</label>
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="firstname" id="focusedInput" type="text" placeholder = "Firstname">
                                          </div>
                                        </div>
										<label>Lastname:</label>
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="lastname" id="focusedInput" type="text" placeholder = "Lastname">
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <div class="controls">
                                          <label>Photo:</label>
                                               <input class="input-file uniform_on" id="fileInput" type="file" placeholder="Image" name="location" required>
                                          </div>
                                        </div>
										<label>Username:</label>
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="username" id="focusedInput" type="text" placeholder = "username">
                                          </div>
                                        </div>
                                        <label>Password:</label>
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="password" id="focusedInput" type="text" placeholder = "password">
                                          </div>
                                        </div>
										
									
											<div class="control-group">
                                          <div class="controls">
												<button name="save" class="btn btn-info"><i class="icon-plus-sign icon-large"></i></button>

                                          </div>
                                        </div>
                                </form>
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
					
					
					    <?php
                            if (isset($_POST['save'])) {
                           
                                $firstname = $_POST['firstname'];
                                $lastname = $_POST['lastname'];
								$username= $_POST['username'];
								$password = $_POST['password'];
								 $location = $_POST['location'];
                                $department_id = $_POST['department'];
								
								
								$query = mysql_query("select * from teacher where firstname = '$firstname' and lastname = '$lastname' ")or die(mysql_error());
								$count = mysql_num_rows($query);
								
								if ($count > 0){ ?>
								<script>
								alert('Teacher Details or Name Already Exist');
								</script>
								<?php
								}else{

                                mysql_query("insert into teacher (firstname,lastname,username,password,location,department_id)
								values ('$firstname','$lastname','$username','$password','$location','$department_id')         
								") or die(mysql_error()); ?>
								<script>
							 	window.location = "teachers.php"; 
								</script>
								<?php   }} ?>
						 
						 