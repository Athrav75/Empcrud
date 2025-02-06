<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php

    include("/Atharv/htdocs/dbconnection/db.php");
    $id = $_GET['id'];
    $query = "delete from employee where eid ='$id'";
    $result = mysqli_query($con,$query);

    if($result)
    {
        echo "<script>window.location.href='viwedata.php';
        </script> ";

    }
    else
    {
        echo "<script>alert('Record Failed to Delete..!');
        window.location.href='viwedata.php';
        </script> ";
    }
       ?>
</body>
</html>