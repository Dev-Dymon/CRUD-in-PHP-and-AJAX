<?php

require "./connect.php";
extract($_POST);


if (isset($_POST['updateid'])) {
    $user_id = $_POST['updateid'];

    $sql = "SELECT * FROM `crud` WHERE id = $user_id";
    $result = $conn->query($sql);

    $userdata = $result->fetch_assoc();


    $modal = '<div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 form-group">
                        <label for="" class="form-label">Name</label>
                        <input type="text" id="updateName" class="form-control" placeholder="Enter your Name" value="' . $userdata['name'] . '">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="" class="form-label">Email</label>
                        <input type="email" id="updateEmail" class="form-control" placeholder="Enter your Email" value="' . $userdata['email'] . '">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="" class="form-label">Mobile</label>
                        <input type="text" id="updateMobile" class="form-control" placeholder="Enter your Mobile number" value="' . $userdata['mobile'] . '">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="" class="form-label">Place</label>
                        <input type="text" id="updatePlace" class="form-control" placeholder="Enter your Place" value="' . $userdata['place'] . '">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" onclick="updateUser(' . $user_id . ')">Update</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <input type="hidden" id="hiddendata" value="' . $user_id . '">
                </div>
            </div>
        </div>';
}
echo $modal;


if (isset($_POST['userid'])) {
    $user_id = $userid;

    $sql = "UPDATE `crud` SET name = '$updateName', email = '$updateEmail', mobile = '$updateMobile', place = '$updatePlace' WHERE id = '$user_id'";
    $conn->query($sql);
}