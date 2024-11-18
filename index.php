<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD with Bootstrap AND AJAX</title>

    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>

<body>


    <!-- modal -->
    <!-- ########################################################################### -->
     <!-- add modal  -->
    <div class="modal fade" id="completeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">New User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 form-group">
                        <label for="" class="form-label">Name</label>
                        <input type="text" id="completename" class="form-control" placeholder="Enter your Name">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="" class="form-label">Email</label>
                        <input type="email" id="completemail" class="form-control" placeholder="Enter your Email">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="" class="form-label">Mobile</label>
                        <input type="text" id="completemobile" class="form-control" placeholder="Enter your Mobile number">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="" class="form-label">Place</label>
                        <input type="text" id="completePlace" class="form-control" placeholder="Enter your Place">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" onclick="addUser()">Submit</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- update modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
       
    </div>
    <!-- ########################################################################### -->


    <div class="container">
        <h1 class="text-center fw-bolder my-3">PHP CRUD with Bootstrap AND AJAX</h1>
        <button class="btn btn-dark my-4" data-bs-toggle="modal" data-bs-target="#completeModal">Add new users</button>
        <div id="displayDataTable">

        </div>
    </div>

    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/jquery.min.js"></script>
    <script src="./js/popper.min.js"></script>

    <script>
        // display function
        $(document).ready(function(){
            displayData();
        });

        function displayData() {
            var displayData = "true";

            $.ajax({
                url: "display.php",
                type: "POST",
                data: {
                    displaySend: displayData
                },
                success: function(data, status){
                    $("#displayDataTable").html(data);
                }
            });
        }

        function addUser() {
            var nameAdd = $("#completename").val();
            var emailAdd = $("#completemail").val();
            var mobileAdd = $("#completemobile").val();
            var placeAdd = $("#completePlace").val();


            $.ajax({
                url: "insert.php",
                type: "POST",
                data: {
                    nameSend: nameAdd,
                    emailSend: emailAdd,
                    mobileSend: mobileAdd,
                    placeSend: placeAdd
                },
                success: function(data, status) {
                    // console.log(status);
                    displayData();
                }
            });
        }

        // delete record from table
        function Deleteuser(deleteid){
            $.ajax({
                url: "delete.php",
                type: "POST",
                data: {
                    deleteSend: deleteid
                },
                success: function(data, status){
                    displayData();
                }
            });
        }

        function GetDetails(updateid){
            $.ajax({
                url: "update.php",
                type: "POST",
                data: {
                    updateid: updateid
                },
                success: function(data, status){
                    $("#updateModal").html(data);
                    $("#updateModal").modal("show");
                }
            });
        }

        function updateUser(userid){
            var updateName = $("#updateName").val();
            var updateEmail = $("#updateEmail").val();
            var updateMobile = $("#updateMobile").val();
            var updatePlace = $("#updatePlace").val();

            $.ajax({
                url: "update.php",
                type: "POST",
                data: {
                    userid: userid,
                    updateName: updateName,
                    updateEmail: updateEmail,
                    updateMobile: updateMobile,
                    updatePlace: updatePlace
                },
                success: function(data, status){
                    displayData();
                }
            });
        }
    </script>
</body>

</html>