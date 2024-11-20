<?php

require("../../php/conn.php");


if(isset($_POST['id'])) {
    // Sanitize the input to prevent SQL injection
    $id = $conn->real_escape_string($_POST['id']);
    $query = "SELECT * FROM Gallery WHERE id = '$id'";
              
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '
                 <link rel="stylesheet" href="https://elusiveicons.com/assets/elusive-icons/css/elusive-icons.css">
                <div class="modal-body">
                    <form id="edit_gallery_model_form" action="process_form.php" method="POST" enctype="multipart/form-data">
                        <!-- Input fields -->
                        <input type="hidden" value="' . $row["id"] . '" class="form-control" id="id" name="id">
                        <div class="mb-3">
                            <label for="name" class="form-label c_black">gallery Name</label>
                            <input type="text" value="' . $row["name"] . '" class="form-control" id="name" name="name" placeholder="Enter gallery name">
                        </div>
                        <div class="mb-3">
                          <label for="img" class="form-label c_black">gallery img</label>
                          <input type="file" class="form-control" id="img" name="img[]" multiple>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
                
            ';
        }
    } else {
        echo "0 results";
    }
} else {
    echo json_encode(array('error' => 'ID parameter is missing'));
}
?>
