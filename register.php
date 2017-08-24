<?php
session_start();
$_SESSION['type'] = 1;
?>
<html>
<head>
  <title>Register</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

</head>
<body>
  <div class="container">


    <form class="form-horizontal" method="get" action="index.php">
        <h2 class="text-center">Register  Here</h2>
      </br>
        <hr>
   <div class="form-group">
     <label for="inputroll" class="col-sm-2 control-label" >Roll Number</label>
     <div class="col-sm-12">
       <input type="text" class="form-control" id="inputEmail3" name="sid" placeholder="Enter Roll Number" required>
     </div>
   </div>
   <div class="form-group">
     <label for="inputbookname"  class="col-sm-2 control-label">Student Name</label>
     <div class="col-sm-12">
       <input type="text" class="form-control" id="inputPassword3" pattern="^[a-zA-Z\s]*$" oninvalid="setCustomValidity('Plz enter only Alphabets ')"
    onchange="try{setCustomValidity('')}catch(e){}" name="sname" placeholder="Enter Student Name" required>
     </div>
   </div>
   <div class="form-group">
     <label for="inputbookname"  class="col-sm-2 control-label">city</label>
     <div class="col-sm-12">
       <input type="text" class="form-control" id="inputPassword3" pattern="^[a-zA-Z\s]*$" oninvalid="setCustomValidity('Plz enter only Alphabets ')"
    onchange="try{setCustomValidity('')}catch(e){}" name="s1" placeholder="Enter city" required>
     </div>
   </div>
   <div class="form-group">
      <label for="inputdept" class="col-sm-2 control-label">marks</label>
      <div class="col-sm-12">
        <input type="number"  max="100" class="form-control" id="inputPassword3" name="s2" placeholder="Enter marks" required>
      </div>
    </div>


   <div class="form-group">
     <div class="text-center col-sm-12" id="btnRegister">
       <button type="submit" name="regbtn" class="btn btn-primary btn-sx">Register!!</button>
     </div>
   </div>
 </form>
</div>

  <script>

  </script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>
