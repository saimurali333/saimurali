<?php
session_start();
$alert = -1;
if($_SESSION['type'] == 1 && isset($_GET['regbtn'])){
    $sid = (int)$_GET['sid'];
    $sname = $_GET['sname'];

    $s1 = (int)$_GET['s1'];
    $s2 = (int)$_GET['s2'];
    $dbusername = 'root';
    $dbpassword = '';



    $mysqli = new mysqli('localhost','root','','riktam');

    /* check connection */
    if($mysqli->connect_errno){
        die('Unable to connect to database [' . $db->connect_error . ']');
    }
    $total = $s1+$s2;
    $insert_row ="INSERT INTO stud(sid, sname, s1, s2) VALUES ('".$sid."','".$sname."','".$s1."','".$s2."');";
    if($mysqli->query($insert_row)===true){
        // echo "Insert Successfully";
        $alert = 1;
    }
    else{
        // echo "Error";
        $alert = 0;
    }
    $_SESSION['type']=0;
    $mysqli->close();
}

else if($_SESSION['type'] == 2 && isset($_GET['btnupdate'])){
     $sid = $_GET['sid'];
     $sname = $_GET['sname'];

     $s1 = $_GET['s1'];
     $s2 = $_GET['s2'];
     $dbusername = 'root';
     $dbpassword = '';



     $mysqli = new mysqli('localhost','root','','riktam');

     /* check connection */
     if($mysqli->connect_errno){
         die('Unable to connect to database [' . $mysqli->connect_error . ']');
     }
     $total = $s1+$s2;
     $update_row ="update stud SET sid='$sid',sname='$sname',s1='$s1',s2='$s2' WHERE sid = '$sid';";
     if($mysqli->query($update_row)===true){
        $alert = 2;
     }
     else{
        $alert = 0;
     }
     $_SESSION['type']=0;
     $mysqli->close();
}
else if(isset($_GET['btnDelete'])){
   $sid = $_GET['sid'];
   $dbusername = 'root';
   $dbpassword = '';



   $mysqli = new mysqli('localhost','root','','riktam');

   if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
  }

  // sql to delete a record
  $sql = "DELETE FROM stud WHERE sid=$sid";

if ($mysqli->query($sql) === TRUE) {
    $alert = 3;
} else {
    $alert = 0;
}

$mysqli->close();

}



?>

<html>
<head>
  <title>Display</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <style type="text/css">
  .form-horizontal, {
          text-align: left;
      }

      .pagination{
        align-items: center;
        margin-left: 600px;

      }
      .pagination a {

          color: black;
          align-self: center;
          float: left;
          padding: 8px 16px;
          text-decoration: none;
          transition: background-color .3s;
        }

      .pagination a.active {
          background-color: #4CAF50;
          color: white;
      }
      .pagination a:hover:not(.active) {background-color: #dddddd;}
.pagination a.active {
          background-color: black;
          color: white;
      }

      .pagination a:hover:not(.active) {background-color: #dddddd;}
  </style>
</head>
<body>
  <?php
    $dbusername = 'root';
    $dbpassword = '';
    if($alert==0)
        echo '<div class="container"><div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong>Unsucessful!</strong> Please try again.
          </div></div>';
    else if($alert==1)
    echo '<div class="container"><div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          <strong>Success!</strong> Registered Successfully.
          </div></div>';
    elseif ($alert==2) {
      echo '<div class="container"><div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <strong>Success!</strong> Updated Successfully.
            </div></div>';
    }
    elseif ($alert==3) {
      echo '<div class="container"><div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <strong>Success!</strong> Deleted Successfully.
            </div></div>';
    }
    $bool=0;
    $mysqli = new mysqli('localhost', 'root', '','riktam');



    /* check connection */
    if($mysqli->connect_errno){
        die('Unable to connect to database [' . $mysqli->connect_error . ']');
    }

    $limit = 4;
    if(isset($_GET['page'])){ $page  = $_GET['page']; }
    else { $page=1; }
    $start_from = ($page-1) * $limit;
    $sql = "SELECT * FROM stud ORDER BY sid ASC LIMIT $start_from, $limit";
    $rs_result = mysqli_query($mysqli,$sql);

    if ($rs_result->num_rows > 0) {
        $bool=1;
        // output data of each row
        /*while($row = $result->fetch_assoc()) {
            echo $row["accno"]. "  " . $row["bname"]. " " . $row["author"]. " " .$row["edition"]. "<br>";
        }*/
    } else {
        $bool=2;
    }
    $mysqli->close();
?>
      <?php
              if($bool==1){
      echo '<div class="container">
              <table class="table table-hover table-striped">
          <thead class="thead-inverse">
            <tr>
              <th>Student Roll</th>
              <th>Student Name</th>
              <th>city</th>
              <th>marks</th>
            
              <th></th>
              <th></th>
            </tr>
          </thead>';
          echo '<tbody>';
                $i=1;
                $dbusername = 'root';
                $dbpassword = '';

                $mysqli = new mysqli('localhost','root','','riktam');

                /* check connection */
                if($mysqli->connect_errno){
                    die('Unable to connect to database [' . $mysqli->connect_error . ']');
                }
                while($row = $rs_result->fetch_assoc()) {
                  echo '<tr>
                  <td>'.$row["sid"].'</td>
                  <td>'.$row["sname"].'</td>
                  <td>'.$row["s1"].'</td>
                  <td>'.$row["s2"].'</td>
                  <td><form action = "update.php"> <input type="hidden" name="sid" value="'.$row["sid"].'"/>
                  <button class="btn btn-primary" type="submit">Edit</button></form>
                  </td>
                  <td><form  action = "index.php"> <input type="hidden" name="sid" value="'.$row["sid"].'"/>
                  <button name="btnDelete" onclick="clicked(event)" class="btn btn-primary" type="submit">Delete</button></form>
                  </td>
                </tr>';
                    $i=$i+1;
              }


          echo '</tbody>
        </table>
      </div>';
              }
              $sql = "SELECT COUNT(sid) FROM stud";
          $rs_result = mysqli_query($mysqli,$sql);
          $row = mysqli_fetch_row($rs_result);
          $total_records = $row[0];
          $total_pages = ceil($total_records / $limit);
          $pagLink = "<div class=\"text-center\"><center><div class=\"pagination\" >  <a href='index.php?page=1'>&laquo;</a>";
          $var=$page-1;
$pagLink .= "<a href='index.php?page=".$var."'><</a>";
          for ($i=1; $i<=$total_pages; $i++) {
            $active = $i == $page ? 'class="active"' : '';
                       $pagLink .= "<a $active href='index.php?page=".$i."'>".$i."</a>";

          }
          $i = $i-1;
$pagLink .= "<a href='index.php?page=".$var."'>></a>";
          
          echo $pagLink . "<a href='index.php?page=".$i."'>&raquo;</a></div></div>";
    ?>
    <?php

?>
    <hr>
  </br>
<div class="text-center col-sm-12">

  <a type="button" href="index1.php" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add new record</a>
  </div>

    <script>
    function clicked(e)
    {
      if(!confirm('Are you sure?'))e.preventDefault();
    }
    </script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/jquery.dataTables.min.js"></script>
		<script src="js/datatables/datatables.js"></script>
		<script type="text/javascript">
		$(document).ready(function() {
			$('.datatable').dataTable({
				"sPaginationType": "bs_four_button"
			});
			$('.datatable').each(function(){
				var datatable = $(this);
				// SEARCH - Add the placeholder for Search and Turn this into in-line form control
				var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
				search_input.attr('placeholder', 'Search');
				search_input.addClass('form-control input-sm');
				// LENGTH - Inline-Form control
				var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
				length_sel.addClass('form-control input-sm');
			});
		});
		</script>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

  </body>
</html>
