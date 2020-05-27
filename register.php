<?php
session_start();
include 'helper.php';

if(isset($_POST['addpickup']))
{
    $usn=$_POST['usn'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $clas=$_POST['clas'];
    $sec=$_POST['sec'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $gname=$_POST['gname'];
    $g_email=$_POST['g_email'];
    $pass=$_POST['password'];
    $pick=$_POST['pick'];
    addpickup($usn,$fname,$lname,$clas,$sec,$phone,$email,$gname,$g_email,$pass,$pick);
}

if(isset($_GET['errorStatus']))
{
$errorStatus = $_GET['errorStatus'];
$errorMessage = $_GET['errorMessage'];
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
<link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/pulse/bootstrap.min.css" rel="stylesheet" integrity="sha384-FnujoHKLiA0lyWE/5kNhcd8lfMILbUAZFAT89u11OhZI7Gt135tk3bGYVBC2xmJ5" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body style="background-color: #a29bfe">
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="background-color: #e3f2fd;">
    <div class="container">
        <a class="navbar-brand" href="#">
   <svg class="bi bi-people" width="1.3em" height="1.3em" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M17 16s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.995-.944v-.002zM9.022 15h7.956a.274.274 0 00.014-.002l.008-.002c-.002-.264-.167-1.03-.76-1.72C15.688 12.629 14.718 12 13 12c-1.717 0-2.687.63-3.24 1.276-.593.69-.759 1.457-.76 1.72a1.05 1.05 0 00.022.004zm7.973.056v-.002zM13 9a2 2 0 100-4 2 2 0 000 4zm3-2a3 3 0 11-6 0 3 3 0 016 0zm-7.064 4.28a5.873 5.873 0 00-1.23-.247A7.334 7.334 0 007 11c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 017 15c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM6.92 12c-1.668.02-2.615.64-3.16 1.276C3.163 13.97 3 14.739 3 15h3c0-1.045.323-2.086.92-3zM3.5 7.5a3 3 0 116 0 3 3 0 01-6 0zm3-2a2 2 0 100 4 2 2 0 000-4z" clip-rule="evenodd"/>
</svg>
    Bus Panel
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
      <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
      </li>
  </ul>
    <ul class="navbar-nav">
      <li class="nav-item active">
   <form method="post">
        <a class="nav-link active btn btn-link" href="index.php">Login</a>
    </form>
      </li>
    </ul>
    </div>
</nav>
<div class="container-fluid">
	<div class="row">
		<div class="col-2"></div>
		<div class="col-8">
			<div class="card" style="margin-top: 15px">
				<div class="card-header">
					<h3>Register</h3>
					<?php
					if(isset($_GET['errorStatus']))
						{
							?>
								<div class="alert alert-danger alert-dismissible fade show" role="alert">
  								<strong><?php echo $errorMessage;?>!</strong><?php echo $errorStatus;?>
  								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
   								<span aria-hidden="true">&times;</span>
  								</button>
								</div>
							<?php
						}
					?>
				</div>
				<div class="card-body">
            <form method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col">
            <div class="form-group">
               <label for="exampleInputEmail1">USN</label>
               <input type="text" name="usn" class="form-control" id="exampleInputEmail1" placeholder="USN">
            </div>
              </div>
              <div class="col">
                <div class="row">
                  <div class="col">
            <div class="form-group">
               <label for="exampleInputEmail1">Class</label>
               <input type="text" name="clas" class="form-control" id="exampleInputEmail1" placeholder="Class">
            </div>
                  </div>
                  <div class="col">
            <div class="form-group">
               <label for="exampleInputEmail1">Section</label>
               <input type="text" name="sec" class="form-control" id="exampleInputEmail1" placeholder="Section">
            </div>
                  </div>
                </div>
              </div>
            </div>
             <div class="row">
              <div class="col">
            <div class="form-group">
               <label for="exampleInputEmail2">First name</label>
               <input type="text" name="fname" class="form-control" id="exampleInputEmail2" placeholder="First name">
            </div>
              </div>
              <div class="col">
            <div class="form-group">
               <label for="exampleInputEmail2">Last name</label>
               <input type="text" name="lname" class="form-control" id="exampleInputEmail2" placeholder="Last name">
            </div>
              </div>
            </div>
<div class="row">
  <div class="col">
            <div class="form-group">
               <label for="exampleInputEmail2">Phone</label>
               <input type="text" name="phone" class="form-control" id="exampleInputEmail2" placeholder="Phone">
            </div>
  </div>
  <div class="col">
            <div class="form-group">
               <label for="exampleInputEmail2">Email</label>
               <input type="email" name="email" class="form-control" id="exampleInputEmail2" placeholder="Email">
            </div>
  </div>
</div>
<div class="row">
  <div class="col">
            <div class="form-group">
               <label for="exampleInputEmail2">Parent name</label>
               <input type="text" name="gname" class="form-control" id="exampleInputEmail2" placeholder="Parent name">
            </div>
  </div>
  <div class="col">
            <div class="form-group">
               <label for="exampleInputEmail2">parent Email</label>
               <input type="email" name="g_email" class="form-control" id="exampleInputEmail2" placeholder="Parent Email">
            </div>
  </div>
</div>
<div class="row">
  <div class="col">
            <div class="form-group">
               <label for="exampleInputEmail2">Password</label>
               <input type="password" name="password" class="form-control" id="exampleInputEmail2" placeholder="Parent Email">
            </div>
  </div>
  <div class="col">
        <div class="form-group">
          <label for="exampleFormControlSelect1">Pickup Point</label>
          <select class="form-control" name="pick" id="exampleFormControlSelect1">
              <option value="nagara">Nagara</option>
              <option value="Mura">Mura</option>
              <option value="Kabala">kabaka</option>
              <option value="Mithur">Mithur</option>
              <option value="Mani">Mani</option>
              <option value="Kalladka">Kalladka</option>
              <option value="Melkar">Melkar</option>
              <option value="B.C.Road">B.C.Road</option>

          </select>
        </div>
  </div>
</div>
            <div class="form-group">
            <label for="examplefile">Photo</label>
            <div class="custom-file" id="examplefile">
               <input type="file" name="image" class="custom-file-input" id="validatedCustomFile" required>
               <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
               <div class="invalid-feedback">Example invalid custom file feedback</div>
            </div>
            </div>

            <button name="addpickup" class="btn-lg btn-block btn-primary mt-2">Submit</button>
          </form>
  				</div>
			</div>
		</div>
		<div class="col-2"></div>
	</div>
</div>
</body>
        <script>
    $('.custom-file input').change(function (e) {
        if (e.target.files.length) {
            $(this).next('.custom-file-label').html(e.target.files[0].name);
        }
    });
        </script>
</html>
