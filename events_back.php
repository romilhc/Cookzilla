<?php
require 'dbconn.php';
echo "Hello";


 if(isset($_POST['uname'])|| isset($_POST['gname']) || isset($_POST['edate']))

                {
                  //$user = $_SESSION['user'];
                  $ename = $_POST['ename'];
                  $gname = $_POST['gname'];
                  $edate = $_POST['edate'];
                  $estime = $_POST['estime'];
                  $eetime = $_POST['eetime'];
                  //echo "Hello";
                  echo $_POST['ename'];
				  echo $_POST['gname'];
				  echo $_POST['edate'];
				  echo $_POST['estime'];
				  echo $_POST['eetime'];
				  //echo $_SESSION['user'];  
                  //
                  $sql = "select gid from cookzilla.group where group.gname = '".$gname."'";
                  echo $sql;
                  $result =  $conn->query($sql);


                  if ($result->num_rows === 0) { 
                   echo "<br>No Recipes Exists in the Database ";
    
    
                    }
                  else {
                    while ($row = $result->fetch_assoc()) {
                        $gid = $row['gid'];
                      # code...
                    }
                    echo $gid;

                   $sql_insert = "insert into event(eid,gid,ename,edate,estime,eetime)
								  select max(eid)+1 as recent,".$gid.",'".$ename."','".$edate."','".$estime."','".$eetime."' from event";
					echo $sql_insert;
                  $sql2 = "INSERT into Event(eid,gid,ename,edate)values(12,".$gid.", '".$ename."','".$edate."')";
                   if($conn->query($sql_insert) === TRUE){
                   	echo "Success";	
                   }
                   


                    # code...
                  }
                }
          else
                {
                echo "Something is missing";
                

                }


?>