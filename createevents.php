 


<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>CookZilla</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="css/datepicker.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/moment.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/js/bootstrap-datetimepicker.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
   

  
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  
  <?php require 'dbconn.php';
  require 'navbar.php';?>

 <div class="container"> 
  <div class = "col-sm-6">
   
   <div class="container">
    <div class="row">
      <div class ='col-sm-6'>
        <div class='col-sm-12'>
            <input type="text" id= "event_name" class="form-control" placeholder="Enter Event Name" name="event_name" required autofocus />
        </div>
      
    </div>
</div>
<br>
   <br>
   <label>Select a value from the list:</label>
   
   
   <select id="dropdown_change" name= "group_dropdown">

   <?php

   if(isset($_SESSION['user']))
                {
                  $user = $_SESSION['user'];
                  
                  $sql = "select gname from cookzilla.group, g_mem where group.gid = g_mem.gid and g_mem.uname = '".$user."' ";
                  $result =  $conn->query($sql);


                  if ($result->num_rows === 0) { 
                   echo "<br>No Recipes Exists in the Database ";
    
    
                    }
                  else {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['gname'] . "'>" . $row['gname'] . "</option>";
                      # code...
                    }
                    # code...
                  }
                }
          else
                {
                
                }

  ?>
 
</select>

<br>
<br>
<div class="container">
    <div class="row">
        <div class='col-sm-12'>
            <input  type="text" class="form-control" placeholder="Pick Date"  id="pickDate"/>
        </div>
      
    </div>
</div>
<br>
<div class="container">
    <div class="row">
        <div class='col-sm-12'>
            <input type='text' class="form-control" id='datetimepicker3' placeholder="Enter Start Time" />
        </div>
      
    </div>
</div>
<br>

<div class="container">
    <div class="row">
        <div class='col-sm-12'>
            <input type='text' class="form-control" id='datetimepicker4' placeholder="Enter End Time" />
        </div>
      
    </div>
</div>
<br>

<center>
<button type="button" class="btn btn-primary" onclick="sendRecords()">Add Events</button>
</center>
    <!-- jQuery (neededcessary for Bootstrap's JavaScript plugins) -->
</div>
</div>
</div>
  </body>
    <script type="text/javascript">
           
        </script>
<script type="text/javascript">

var ename;
var gname;
var estime;
var eetime;
var edate;

  $(document).ready(function(){
     $("#dropdown_change").change(function(){
      gname = $('#dropdown_change').val();
      //alert("Selected value is : " +gname);

     });
   });




 $(function() {
    $("#pickDate").datepicker({ 
        format: "yyyy-mm-dd", 
        
    });
});

$(function () {
                $('#datetimepicker3').datetimepicker({
                  format:"HH:mm:ss"
                });
            });


 $(function () {
                $('#datetimepicker4').datetimepicker({
                  format:"HH:mm:ss"
                });
            });


           

    

              function sendRecords(){

                ename = $('#event_name').val();
                edate = $('#pickDate').val();
                estime = $('#datetimepicker3').val();
                
                eetime = $('#datetimepicker4').val();
                

                var formData ={
                  'ename':ename,
                  'gname':gname,
                  'edate':edate,
                  'estime':estime,
                  'eetime':eetime
                };

                alert (formData);
                $.ajax({
                  type:"POST",
                  url:"events_back.php",
                  data:formData,
                  dataType: 'json',
                  cache: false,
                  success: function(result){
                      alert ("Event Created");
                  }
                });

                
              }
        </script>
  
</html>




