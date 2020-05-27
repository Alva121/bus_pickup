<?php
function login($usn,$password,$type)
{

include "db.php";
        
    $staff=mysqli_query($conn,"select * from user where usn='$usn' and pass='$password' and type='$type'");

      if(mysqli_num_rows($staff)==1)
        {
          while ($row= mysqli_fetch_array($staff)) 
            {
              $_SESSION["usn"]=$row[0];
              $_SESSION["type"]=$row[11];
              $_SESSION["media_id"]=$row[12];
            }
          if($_SESSION["type"]=="Admin")
            {
              header("Location:home.php");
            }
          if($_SESSION["type"]=="Student")
            {
              header("location:student.php");
            }
        }
      else
        {
          header("location:index.php?errorMessage=Login_Failed&errorStatus=_Please_Try_Again");
        }

}


//add student
function addpickup($usn,$fname,$lname,$clas,$sec,$phone,$email,$gname,$g_email,$pass,$pick)
{
  include "db.php";
  $fileinfo=PATHINFO($_FILES["image"]["name"]);
  $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
  move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/" . $newFilename);
  $location="uploads/" . $newFilename;

$class="$clas$sec";
$type="Student";
$result=mysqli_query($conn,"insert into user (usn,fname,lname,class,phone,email,gname,g_email,pass,pickup,type,media_id) values ('$usn','$fname','$lname','$class','$phone','$email','$gname','$g_email','$pass','$pick','$type','$location')");
if($result)
	{
  header("location:register.php?errorMessage=Registration_success&errorStatus=_New_Student_Added&error=success");
	}
else
	{
   header("location:register.php?errorMessage=Registration_Failed&errorStatus=_Please_Try_Again&error=danger");
	}
}



// view student
function viewuser()
{
  include "db.php";
$result=mysqli_query($conn,"select * from user where type='Student'");
while($row= mysqli_fetch_array($result))
{
  ?>
     <tr>
      <th scope="row"><?php echo $row["0"]; ?></th>
      <th><?php echo $row["1"]; ?> <?php echo $row["2"]; ?></th>
      <td><?php echo $row["3"]; ?></td>
      <td><?php echo $row["4"]; ?></td>
      <td><?php echo $row["7"]; ?></td>
      <td><?php echo $row["11"]; ?></td>
      <td width="10%">
      	<a href="?deleteuser=<?php echo $row['1']; ?>" name="deleteuser" class="btn btn-danger">Delete</a>
    </tr>
<?php
}}

// view student
function alluser()
{
  include "db.php";
$result=mysqli_query($conn,"select * from user where type='Student'");
while($row= mysqli_fetch_array($result))
{
  ?>
     <tr>
      <th scope="row"><?php echo $row["0"]; ?></th>
      <th scope="row"><?php echo $row["1"]; ?><?php echo $row["2"]; ?></th>
      <th scope="row"><?php echo $row["7"]; ?></th>
      <td width="10%">

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  View
</button>
    </tr>
<div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form method="post">
            <div class="row">
              <div class="col">
            <div class="form-group">
               <label for="exampleInputEmail1">USN</label>
               <input type="text" name="usn" class="form-control" id="exampleInputEmail1" value="<?php echo $row["0"]; ?>" readonly>
            </div>
              </div>
              <div class="col">
            <div class="form-group">
               <label for="exampleInputEmail1">Class</label>
               <input type="text" name="clas" class="form-control" id="exampleInputEmail1" value="<?php echo $row["7"]; ?>">
            </div>
              </div>
            </div>
             <div class="row">
              <div class="col">
            <div class="form-group">
               <label for="exampleInputEmail2">First name</label>
               <input type="text" name="fname" class="form-control" id="exampleInputEmail2" value="<?php echo $row["1"]; ?>" disabled>
            </div>
              </div>
              <div class="col">
            <div class="form-group">
               <label for="exampleInputEmail2">Last name</label>
               <input type="text" name="lname" class="form-control" id="exampleInputEmail2" value="<?php echo $row["2"]; ?>" disabled>
            </div>                
              </div>
            </div>
<div class="row">
  <div class="col"> 
            <div class="form-group">
               <label for="exampleInputEmail2">Phone</label>
               <input type="text" name="phone" class="form-control" id="exampleInputEmail2" value="<?php echo $row["4"]; ?>">
            </div>
  </div>
  <div class="col">
            <div class="form-group">
               <label for="exampleInputEmail2">Email</label>
               <input type="email" name="email" class="form-control" id="exampleInputEmail2" value="<?php echo $row["4"]; ?>">
            </div>   
  </div>
</div>
<div class="row">
  <div class="col"> 
            <div class="form-group">
               <label for="exampleInputEmail2">Parent name</label>
               <input type="text" name="gname" class="form-control" id="exampleInputEmail2" value="<?php echo $row["5"]; ?>">
            </div>
  </div>
  <div class="col">
            <div class="form-group">
               <label for="exampleInputEmail2">parent Email</label>
               <input type="email" name="g_email" class="form-control" id="exampleInputEmail2" value="<?php echo $row["6"]; ?>">
            </div>   
  </div>
</div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Pickup Point</label>
          <select class="form-control" name="pick" id="exampleFormControlSelect1">
              <option value="Mura">Mura</option>
              <option value="Kabala">kabala</option>
              <option value="Mithur">Mithur</option>
              <option value="Mani">Mani</option>
              <option value="Kalladka">Kalladka</option>
              <option value="Melkar">Melkar</option>
              <option value="B.C.Road">B.C.Road</option>
              <option value="<?php echo $row["10"]; ?>" selected><?php echo $row["10"]; ?></option>
          </select>
        </div>
        <button name="updatepickup" class="btn-lg btn-block btn-primary mt-2">Update</button>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="?deleteuser=<?php echo $row['0']; ?>" name="deleteuser" class="btn btn-danger">Delete</a>
      </div>
    </div>
  </div>
</div>
<?php
}}


//delete User
function viewprofile()
{
  include "db.php";
  $usn=$_SESSION["usn"];
$result=mysqli_query($conn,"select * from user where usn='$usn'");
while($row= mysqli_fetch_array($result))
{
  ?>

            <form>
            <div class="row">
              <div class="col">
            <div class="form-group">
               <label for="exampleInputEmail1">USN</label>
               <input type="text" name="usn" class="form-control" id="exampleInputEmail1" value="<?php echo $row["0"]; ?>" disabled>
            </div>
              </div>
              <div class="col">
            <div class="form-group">
               <label for="exampleInputEmail1">Class</label>
               <input type="text" name="clas" class="form-control" id="exampleInputEmail1" value="<?php echo $row["7"]; ?>" disabled>
            </div>
              </div>
            </div>
             <div class="row">
              <div class="col">
            <div class="form-group">
               <label for="exampleInputEmail2">First name</label>
               <input type="text" name="fname" class="form-control" id="exampleInputEmail2" value="<?php echo $row["1"]; ?>" disabled>
            </div>
              </div>
              <div class="col">
            <div class="form-group">
               <label for="exampleInputEmail2">Last name</label>
               <input type="text" name="lname" class="form-control" id="exampleInputEmail2" value="<?php echo $row["2"]; ?>" disabled>
            </div>                
              </div>
            </div>
<div class="row">
  <div class="col"> 
            <div class="form-group">
               <label for="exampleInputEmail2">Phone</label>
               <input type="text" name="phone" class="form-control" id="exampleInputEmail2" value="<?php echo $row["4"]; ?>" disabled>
            </div>
  </div>
  <div class="col">
            <div class="form-group">
               <label for="exampleInputEmail2">Email</label>
               <input type="email" name="email" class="form-control" id="exampleInputEmail2" value="<?php echo $row["4"]; ?>" disabled>
            </div>   
  </div>
</div>
<div class="row">
  <div class="col"> 
            <div class="form-group">
               <label for="exampleInputEmail2">Parent name</label>
               <input type="text" name="gname" class="form-control" id="exampleInputEmail2" value="<?php echo $row["5"]; ?>" disabled>
            </div>
  </div>
  <div class="col">
            <div class="form-group">
               <label for="exampleInputEmail2">parent Email</label>
               <input type="email" name="g_email" class="form-control" id="exampleInputEmail2" value="<?php echo $row["6"]; ?>" disabled>
            </div>   
  </div>
</div>
            <div class="form-group">
               <label for="exampleInputEmail2">Pick up</label>
               <input type="email" name="g_email" class="form-control" id="exampleInputEmail2" value="<?php echo $row["10"]; ?>" disabled>
            </div> 
          </form>
<?php
}
}


//add student
function updatepickup($usn,$clas,$phone,$email,$gname,$g_email,$pick)
{
  include "db.php";
// echo $usn,$clas,$phone,$email,$gname,$g_email,$pick;
$result=mysqli_query($conn,"UPDATE `user` SET class='$clas',phone='$phone',email='$email',gname='$gname',g_email='$g_email',pickup='$pick' where usn='$usn'");
if($result)
  {
   echo "<script>alert('Updated successful');</script>";
  }
else
  {
    echo "<script>alert('Try Again');</script>";
  }
}

//delete User
function deleteuser($id)
{
    include "db.php";

$result=mysqli_query($conn,"delete from user where usn='$id'");

if($result)
  {
        echo "<script>alert('Deleted successful');</script>";
    }
    else
    {
        echo "<script>alert('Try again');</script>";
    }
}










?>