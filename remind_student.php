<table cellpadding="0" cellspacing="0" border="0" class="table" id="">
							<form method="POST">

                            <thead>
                                    <tr>
                                
                                   
                                    </tr>
                                    
                            </thead>
                            <tbody>
                                
                                    <?php
                                            $my_student = mysqli_query($conn,"SELECT * FROM teacher_class_student
                                            LEFT JOIN student ON student.student_id = teacher_class_student.student_id 
                                            INNER JOIN class ON class.class_id = student.class_id 
                                            RIGHT JOIN student_number ON student_number.student_ID = teacher_class_student.student_id
                                            where teacher_class_id = '$get_id' order by lastname ")or die(mysqli_error());
                                            while($row = mysqli_fetch_array($my_student)){
                                            $id = $row['teacher_class_student_id'];
                                            ?>                          
               

               <h2>Warning! All the Student of this class will recieved a SMS Notification Check the Check box If you are accepting</h2>
                          <td>  <input type="checkbox" value="<?php  echo $row['number_student']; ?>"></td>
                          <button id="delete"  class="btn btn-info" name="read"><i class="icon-check"></i> Send</button>
                     

                   
                    </tr>
             
             <?php } ?>
               
                  
                            </tbody>
                            </form>
                        </table>