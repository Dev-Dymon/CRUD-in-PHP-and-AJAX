<?php

require "./connect.php";

extract($_POST);

if (isset($_POST["displaySend"])) {

    $table = '<table class="table table-bordered">
        <thead class="table-dark">
            <tr>
            <th scope="col">S/N</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Mobile</th>
            <th scope="col">Place</th>
            <th scope="col">Operations</th>
            </tr>
        </thead>';

    $sql = "SELECT * FROM `crud`";
    $result = $conn->query($sql);
    $number = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row["id"];
        $name = $row["name"];
        $email = $row["email"];
        $mobile = $row["mobile"];
        $place = $row["place"];

        $table .= '<tbody>
            <tr>
            <td scope="row">' . $number . '</td>
            <td scope="row" hidden>' . $id . '</td>
            <td>' . $name . '</td>
            <td>' . $email . '</td>
            <td>' . $mobile . '</td>
            <td>' . $place . '</td>
            <td>
                <button class="btn btn-dark" onclick="GetDetails('.$id.')">Update</button>
                <button class="btn btn-danger" onclick="Deleteuser('.$id.')">Delete</button>
            </td>
            </tr>
            </tbody>';

        $number++;
    }
    $table .= '</table>';

    echo $table;
}
