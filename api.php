<?php

include "./db.php";

$cur_date = date('Y:m:d');


// add
if (isset($_POST['addEmpBtn'])) {
  $uname = mysqli_real_escape_string($conn, $_POST['uname']);
  $des = mysqli_real_escape_string($conn, $_POST['designation']);
  $gender = mysqli_real_escape_string($conn, $_POST['gender']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);

  $query = "INSERT INTO employees(emp_name,designation,gender,phone,email,created_at,updated_at) 
            VALUES('$uname', '$des', '$gender', '$phone', '$email', '$cur_date', '$cur_date')";
  $query_run = mysqli_query($conn, $query) or die(mysqli_error($conn));

  if ($query_run) {
    echo json_encode(["status" => 200, "message" => "Added Succcessfully"]);
  } else {
    echo json_encode(["status" => 500, "message" => "Something went wrong"]);
  }

  return;
}

// edit
if (isset($_POST['editEmpBtn'])) {
  $id = mysqli_real_escape_string($conn, $_POST['emp_id']);
  $uname = mysqli_real_escape_string($conn, $_POST['uname']);
  $des = mysqli_real_escape_string($conn, $_POST['designation']);
  $gender = mysqli_real_escape_string($conn, $_POST['gender']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);

  $query = "UPDATE employees SET emp_name='$uname',designation='$des',gender='$gender',phone='$phone',email='$email',updated_at='$cur_date' WHERE id='$id'";
  $query_run = mysqli_query($conn, $query) or die(mysqli_error($conn));

  if ($query_run) {
    echo json_encode(["status" => 200, "message" => "Updated Succcessfully"]);
  } else {
    echo json_encode(["status" => 500, "message" => "Something went wrong"]);
  }

  return;
}


// view
if (isset($_GET['empId'])) {


  $id = mysqli_real_escape_string($conn, $_GET['empId']);
  fetch_single($id);
  // $query = "SELECT * FROM employees WHERE id='$id'";

  // $query_run = mysqli_query($conn, $query) or die(mysqli_error($conn));
  // if ($query_run) {
  //   $row = mysqli_fetch_array($query_run);
  //   echo json_encode(["status" => 200, "message" => $row]);
  // } else {
  //   echo json_encode(["status" => 404, "message" => "Record not found"]);
  // }

  return;
}

// delete
if (isset($_POST['delId'])) {
  $id = mysqli_real_escape_string($conn, $_POST['delId']);
  $query = "DELETE FROM employees WHERE id='$id'";

  $query_run = mysqli_query($conn, $query) or die(mysqli_error($conn));
  if ($query_run) {
    echo json_encode(["status" => 200, "message" => "Record deleted"]);
  } else {
    echo json_encode(["status" => 500, "message" => "Something went wrong"]);
  }

  return;
}

// fetch single
function fetch_single($id)
{
  $con = $GLOBALS['conn'];
  $query = "SELECT * FROM employees WHERE id='$id'";

  $query_run = mysqli_query($con, $query) or die(mysqli_error($con));
  if ($query_run) {
    $row = mysqli_fetch_array($query_run);
    echo json_encode(["status" => 200, "message" => $row]);
  } else {
    echo json_encode(["status" => 404, "message" => "Record not found"]);
  }
}
