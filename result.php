<?php
include_once 'php/connection.php';
$result = mysqli_query($conn, "SELECT * FROM email");
?>
<!DOCTYPE html>
<html>

<head>
    <title>data</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tableResults').DataTable();
        });
    </script>
</head>

<body>
    <?php
    if (mysqli_num_rows($result) > 0) {
    ?>
        <table id="tableResults">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Email</td>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td>Id</td>
                    <td>Email</td>
                </tr>
            </tfoot>
            <tbody>
                <?php
                $i = 0;
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td><?php echo $row["Id"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                    </tr>
                <?php
                    $i++;
                }
                ?>
            </tbody>
        </table>
    <?php
    } else {
        echo "No result found";
    }
    ?>
    <h2>Filter by email domain</h2>
    <?php
    $result = mysqli_query($conn, "SELECT * FROM email");
    if (mysqli_num_rows($result) > 0) {
        $i = 0;
        $emailArray = array();
        while ($row = mysqli_fetch_array($result)) {
            $emailDomain = $row["email"];
            $emailDomain = explode("@", $emailDomain);
            $emailDomain = $emailDomain[1];
            array_push($emailArray, $emailDomain);
            $i++;
        }
        $emailArray = array_unique($emailArray);
        $emailArray = array_values($emailArray);
        $i = 0;
        //creates unique email domain buttons
        foreach ($emailArray as $item) {
    ?>
            <form method="post">
                <button name="submit " id="<?php echo $i ?>" value="<?php echo $emailArray[$i] ?>"><?php echo $emailArray[$i] ?></button>
            </form>
    <?php
            $i++;
        }
    }
    //filters by domain
    if (isset($_POST["submit"])) {
        $filter = $_POST["submit"];
        $result = mysqli_query($conn, "SELECT * FROM email WHERE email LIKE '%$filter%'");
        //...
    }
    ?>
</body>

</html>