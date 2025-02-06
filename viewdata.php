<?php
include("/Atharv/htdocs/dbconnection/db.php");

if (isset($_GET['searchbtn'])) {
    $id = $_GET['id'];
    $query = "select * from employee where eid='$id'";
    $run = mysqli_query($con, $query);
} else {

    $query = "select * from employee";
    $run = mysqli_query($con, $query);
}

function b1()
{
    global $id;
    if($id)
    {
        return "<a class='btn btn-outline-primary btn-sm mb-2' href='viewData.php'>Back</a>";
    }
    else
    {
        return "";
    }
 
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="col-8 offset-2 mt-3 border shadow p-4">
        <h3 class="display-6 text-center"> Employee Data</h3>
        <?php 
echo b1();
        ?>
        <table class="table table-bordered">
            <tr>
                <th>Employee Id</th>
                <th>Employee Name</th>
                <th>Age</th>
                <th>Salary</th>
                <th>Mobile No</th>
                <th>Actions

                </th>
            </tr>
            <?php
            while ($data = mysqli_fetch_assoc($run)) {

                echo "
                <tr>
                    <td>" . $data['eid'] . "</td>
                   <td>" . $data['name'] . "</td>
                    <td>" . $data['age'] . "</td>
                   <td>" . $data['salary'] . "</td>
                    <td>" . $data['mono'] . "</td>
                    <td>
                    <a href='delete.php?id=$data[eid]' class='btn btn-danger' onclick='return Confirmation()'>Delete</a>
                  <a href='update.php?id=$data[eid]' class='btn btn-success'>Update</a>
                    </td>
                </tr>";
            }
            ?>
        </table>
        <a href="insertrecord.php" class="btn btn-dark w-100">Insert Record</a>

        <form action="" method="get">
            <input type="text" name="id" class="form-control mt-4">
            <input type="submit" class="btn btn-secondary w-100 mt-3" value="Search Record" name="searchbtn">
        </form>

    </div>
</body>
<script>
    function Confirmation() {
        return confirm("Are You Sure to Delete Data??");
    }
</script>

</html>