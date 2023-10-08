<?php require_once "includes/header.php" ?>
<title>Data Entry | Add Item</title>
</head>


<body>

    <?php require_once "includes/sidebar.php" ?>





    <script>
        function validateNumber(input) {
            // Remove any non-numeric characters using a regular expression
            input.value = input.value.replace(/[^0-9]/g, '');
        }

        function validateNumbers(input) {
            // Remove any non-numeric characters using a regular expression
            input.value = input.value.replace(/[^0-9]/g, '');
        }


        $(document).ready(function() {
            $("#submitForm").on("click", function() {
                // Collect form data
                var formData = {
                    equipmentName: $("#equipmentName").val(),
                    equipmentType: $("#equipmentType").val(),
                    propertyNumber: $("#propertyNumber").val(),
                    quantity: $("#quantity").val(),
                    location: $("#location").val(),
                    dateOfPurchase: $("#dateOfPurchase").val(),
                    cost: $("#cost").val(),
                    status: $("#status").val(),
                };

                // Send an AJAX request to the server
                $.ajax({
                    type: "POST",
                    url: "insert_data.php", // Replace with the actual URL to your PHP script
                    data: formData,
                    success: function(response) {
                        // Handle the response from the server here, if needed
                        console.log(response);

                        // Optionally, clear the form after successful submission
                        $("#equipmentForm")[0].reset();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(error);
                    },
                });
            });
        });
    </script>









    <div class="container">
        <form id="equipmentForm" class="border p-5" style="background-color: white;">
            <div class="row m-2">
                <div class="col">
                    <label for="equipmentName">Equipment Name</label>
                    <input type="text" class="form-control" id="equipmentName" placeholder="Equipment Name *" required>
                </div>
                <div class="col">
                    <label for="equipmentType">Type</label>
                    <select class="form-select" id="equipmentType" aria-label="Select Type menu *" required>
                        <option selected>Select Type menu *</option>
                        <option value="furniture_equipment">School Furniture</option>
                        <option value="electrical_equipment">Electrical</option>
                        <option value="office_equipment">Office Supplies and Equipment</option>
                        <option value="utilities_equipment">Utilities</option>
                    </select>
                </div>
            </div>
            <div class="row m-2">
                <div class="col">
                    <label for="propertyNumber">Property Number </label>
                    <input type="text" class="form-control" id="propertyNumber" placeholder="Property Number *"
                        required>
                </div>
                <div class="col">
                    <label for="quantity">Quantity</label>
                    <input oninput="validateNumber(this)" type="text" class="form-control" id="quantity"
                        placeholder="Quantity *" required>
                </div>
            </div>
            <div class="row m-2">
                <div class="col">
                    <label for="location">Location</label>
                    <input type="text" class="form-control" id="location" placeholder="Location *" required>
                </div>
                <div class="col">
                    <label for="dateOfPurchase">Date of Purchase</label>
                    <input type="date" class="form-control" id="dateOfPurchase" placeholder="Date of Purchase *"
                        required>
                </div>
            </div>
            <div class="row m-2">
                <div class="col">
                    <label for="cost">Cost</label>
                    <input oninput="validateNumbers(this)" type="text" class="form-control" id="cost"
                        placeholder="Cost *" required>
                </div>
                <div class="col">
                    <label for="status">Status</label>
                    <select class="form-select" id="status" aria-label="Select Status menu *" required>
                        <option selected>Select Status menu *</option>
                        <option value="Functional">Functional</option>
                        <option value="Non-Functional">Non-Functional</option>
                        <option value="Repairable">Repairable</option>
                    </select>
                </div>
            </div>

            <div class="row m-2">
                <div class="col">
                    <button type="button" id="submitForm" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>















    <?php require_once "includes/footer.php" ?>