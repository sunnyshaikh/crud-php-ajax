<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Employee CRUD</title>
  <!-- bootstrap css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <!-- bootstrap icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <!-- jquery cdn -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- dt -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
</head>

<body>
  <!-- <?php include "./partials/navbar.php" ?> -->

  <!-- Add Modal -->
  <div class="modal fade" id="addEmp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form id="addForm" method="post">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Employee</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="uname" class="form-label">Name</label>
              <input type="text" class="form-control" id="uname" name="uname" placeholder="e.g. John Doe" required>
            </div>
            <div class="mb-3">
              <label for="designation" class="form-label">Designation</label>
              <input type="text" class="form-control" id="designation" name="designation" placeholder="e.g. Sles Manager" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Gender</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" value="male" name="gender" id="flexRadioDefault1" checked>
                <label class="form-check-label" for="flexRadioDefault1">
                  Male
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" value="female" name="gender" id="flexRadioDefault2">
                <label class="form-check-label" for="flexRadioDefault2">
                  Female
                </label>
              </div>
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label">Phone</label>
              <input type="text" class="form-control" id="phone" name="phone" placeholder="e.g. 9876543210" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="e.g. john@email.com" required>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" id="addEmpBtn" class="btn btn-primary">Add</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- view Modal -->
  <div class="modal fade" id="viewEmp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form id="addForm" method="post">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">View Employee</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="uname" class="form-label">Name</label>
              <input type="text" class="form-control" id="uname_v" disabled>
            </div>
            <div class="mb-3">
              <label for="designation" class="form-label">Designation</label>
              <input type="text" class="form-control" id="designation_v" disabled>
            </div>
            <div class="mb-3">
              <label class="form-label">Gender</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" value="male" name="gender" id="male" disabled>
                <label class="form-check-label" for="male">
                  Male
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" value="female" name="gender" id="female" disabled>
                <label class="form-check-label" for="female">
                  Female
                </label>
              </div>
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label">Phone</label>
              <input type="text" class="form-control" id="phone_v" disabled>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email_v" disabled>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- Edit Modal -->
  <div class="modal fade" id="editEmp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form id="editForm" method="post">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Employee</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="">
              <input type="hidden" class="form-control" id="emp_id" name="emp_id" readonly>
            </div>
            <div class="mb-3">
              <label for="uname" class="form-label">Name</label>
              <input type="text" class="form-control" id="uname_e" name="uname" placeholder="e.g. John Doe" required>
            </div>
            <div class="mb-3">
              <label for="designation" class="form-label">Designation</label>
              <input type="text" class="form-control" id="designation_e" name="designation" placeholder="e.g. Sles Manager" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Gender</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" value="male" name="gender" id="male_e" checked>
                <label class="form-check-label" for="male_e">
                  Male
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" value="female" name="gender" id="female_e">
                <label class="form-check-label" for="female_e">
                  Female
                </label>
              </div>
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label">Phone</label>
              <input type="text" class="form-control" id="phone_e" name="phone" placeholder="e.g. 9876543210" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email_e" name="email" aria-describedby="emailHelp" placeholder="e.g. john@email.com" required>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" id="editEmpBtn" class="btn btn-primary">Edit</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- display table -->
  <div class="container py-5">
    <!-- add modal -->
    <div class="mb-3 row align-items-center">
      <div class="col-6">
        <h1>CRUD</h1>
      </div>
      <div class="col-6">
        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addEmp">
          Add Employee
        </button>
      </div>
    </div>
    <div class="table-responsive mt-3">
      <table class="table table-bordered table-striped" id="myTable">
        <thead class="table-primary">
          <tr>
            <th scope="col">Edit</th>
            <th scope="col">Emp Id</th>
            <th scope="col">Emp name</th>
            <th scope="col">Designation</th>
            <th scope="col">Gender</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            <th scope="col">Status</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include './db.php';
          $fetch = "SELECT * FROM employees";
          $query_run = mysqli_query($conn, $fetch);

          while ($row = mysqli_fetch_array($query_run)) { ?>
            <tr>
              <td>
                <button class="btn btn-primary editEmp" value="<?php echo $row['id'] ?>" data-bs-toggle="modal" data-bs-target="#editEmp">
                  <i class="bi bi-pencil"></i>
                </button>
              </td>
              <td><?php echo $row['id'] ?></td>
              <td>
                <button type="button" class=" btn btn-sm text-primary viewEmp" value="<?php echo $row['id'] ?>" data-bs-toggle="modal" data-bs-target="#viewEmp">
                  <?php echo $row['emp_name'] ?>
                </button>
              </td>
              <td><?php echo $row['designation'] ?></td>
              <td><?php echo $row['gender'] ?></td>
              <td><?php echo $row['phone'] ?></td>
              <td><?php echo $row['email'] ?></td>
              <td>
                <?php
                if ($row['status'] == 1)
                  echo "Active";
                else
                  echo "Inactive";
                ?>
              </td>
              <td>
                <button class="btn btn-danger delRecord" value="<?php echo $row['id'] ?>">
                  <i class="bi bi-trash"></i>
                </button>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>


  <!-- bootstrap js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <!-- dt -->
  <script src="http://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script>
    $(function() {

      $("#myTable").DataTable({
        // dom: 'Bfrtip',
        buttons: [
          'colvis',
          'excel',
          'print'
        ]
      })

      // add
      $("#addForm").on("submit", function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        formData.append("addEmpBtn", true);

        $.ajax({
          url: 'api.php',
          type: 'POST',
          data: formData,
          processData: false,
          contentType: false,
          success: function(data) {
            $("#addForm")[0].reset();
            $("#addEmp").modal('hide');
            $("#myTable").load(location.href + " #myTable")
          }
        });

      })

      // view
      $(".viewEmp").on("click", function() {
        let empId = $(this).val();
        $.ajax({
          url: `./api.php?empId=${empId}`,
          type: 'GET',
          success: function(data) {
            data = $.parseJSON(data)

            $("#uname_v").val(data.message.emp_name);
            $("#designation_v").val(data.message.designation);
            $("#phone_v").val(data.message.phone);
            $("#email_v").val(data.message.email);

            if (data.message.gender === "male") {
              $("#male").attr("checked", true)
              $("#female").attr("checked", false)
            } else {
              $("#male_e").attr("checked", false)
              $("#female").attr("checked", true)
            }

          }
        })
      })

      // edit
      $(".editEmp").on('click', function() {
        let empId = $(this).val();
        $.ajax({
          url: `./api.php?empId=${empId}`,
          type: 'GET',
          success: function(data) {
            data = $.parseJSON(data)

            $("#emp_id").val(data.message.id);
            $("#uname_e").val(data.message.emp_name);
            $("#designation_e").val(data.message.designation);
            $("#phone_e").val(data.message.phone);
            $("#email_e").val(data.message.email);

            if (data.message.gender === "male") {
              $("#male_e").attr("checked", true)
              $("#female_e").attr("checked", false)
            } else {
              $("#male_e").attr("checked", false)
              $("#female_e").attr("checked", true)
            }

          }
        })
      })
      // edit
      $("#editForm").on("submit", function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        formData.append("editEmpBtn", true);

        $.ajax({
          url: 'api.php',
          type: 'POST',
          data: formData,
          processData: false,
          contentType: false,
          success: function(data) {
            $("#editForm")[0].reset();
            $("#editEmp").modal('hide');
            $("#myTable").load(location.href + " #myTable")
          }
        });

      })

      // delete
      $(".delRecord").on("click", function() {
        let confirmDel = confirm("Are you sure you want to delete?")
        if (!confirmDel) return
        let empId = $(this).val();
        $.ajax({
          url: "./api.php",
          type: 'POST',
          data: {
            delId: empId
          },
          success: function(data) {
            $("#myTable").load(location.href + " #myTable")
          }
        })
      })
    });
  </script>
</body>

</html>