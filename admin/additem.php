<?php require_once "includes/header.php" ?>
<title>Data Entry | Add Item</title>
</head>


<body>

    <?php require_once "includes/sidebar.php" ?>






    <!-- <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script> -->


    <div class="container">
        <form class="border p-5" style="background-color: white;">
            <div class="row m-2">
                <div class="col">
                    <label for="validationCustom02">Last name</label>
                    <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="Otto"
                        required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>

                </div>
                <div class="col">
                    <label for="inputPassword4">Type</label>
                    <input type="text" class="form-control" id="inputPassword4" placeholder="Type *">
                </div>
            </div>
            <div class="row m-2">
                <div class="col">
                    <label for="inputEmail4">Property Number</label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Property Number *">
                </div>
                <div class="col">
                    <label for="inputPassword4">Quatinty</label>
                    <input type="text" class="form-control" id="inputPassword4" placeholder="Quatinty *">
                </div>
            </div>
            <div class="row m-2">
                <div class="col">
                    <label for="inputEmail4">Location</label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Location *">
                </div>
                <div class="col">
                    <label for="inputPassword4">Date of Purchase</label>
                    <input type="date" class="form-control" id="inputPassword4" placeholder="Date of Purchase *">
                </div>
            </div>
            <div class="row m-2">
                <div class="col">
                    <label for="inputEmail4">Cost</label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Cost *">
                </div>
                <div class="col">
                    <label for="inputPassword4">Password</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">Functional</option>
                        <option value="2">Non-Functional</option>
                        <option value="3">Repairable</option>
                    </select>
                </div>
            </div>

            <div class="row m-2">
                <div class="col">
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </div>
            </div>
        </form>
    </div>













    <div class="container">


    </div>

















    <?php require_once "includes/footer.php" ?>