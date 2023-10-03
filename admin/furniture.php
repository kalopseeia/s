<?php require_once "includes/header.php" ?>
<title>Dashboard | Furniture</title>
</head>


<body>

    <?php require_once "includes/sidebar.php" ?>


















    <script>
        function Dfurniture_sortTablePrtyNo() {
            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById("Dfurniture_Table");
            switching = true;
            /*Make a loop that will continue until
            no switching has been done:*/
            while (switching) {
                //start by saying: no switching is done:
                switching = false;
                rows = table.rows;
                /*Loop through all table rows (except the
                first, which contains table headers):*/
                for (i = 1; i < (rows.length - 1); i++) {
                    //start by saying there should be no switching:
                    shouldSwitch = false;
                    /*Get the two elements you want to compare,
                    one from current row and one from the next:*/
                    x = rows[i].getElementsByTagName("TD")[0];
                    y = rows[i + 1].getElementsByTagName("TD")[0];
                    //check if the two rows should switch place:
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        //if so, mark as a switch and break the loop:
                        shouldSwitch = true;
                        break;
                    }
                }
                if (shouldSwitch) {
                    /*If a switch has been marked, make the switch
                    and mark that a switch has been done:*/
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                }
            }
        }


        function Dfurniture_sortTableDteOfPrchse() {
            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById("Dfurniture_Table");
            switching = true;
            /*Make a loop that will continue until
            no switching has been done:*/
            while (switching) {
                //start by saying: no switching is done:
                switching = false;
                rows = table.rows;
                /*Loop through all table rows (except the
                first, which contains table headers):*/
                for (i = 1; i < (rows.length - 1); i++) {
                    //start by saying there should be no switching:
                    shouldSwitch = false;
                    /*Get the two elements you want to compare,
                    one from current row and one from the next:*/
                    x = rows[i].getElementsByTagName("TD")[0];
                    y = rows[i + 1].getElementsByTagName("TD")[0];
                    //check if the two rows should switch place:
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        //if so, mark as a switch and break the loop:
                        shouldSwitch = true;
                        break;
                    }
                }
                if (shouldSwitch) {
                    /*If a switch has been marked, make the switch
                    and mark that a switch has been done:*/
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                }
            }
        }
    </script>





    <div class="container">
        <table class="table table-hover tblehover table-bordered" id="Dfurniture_Table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Equipment Name</th>
                    <th scope="col" onclick="Dfurniture_sortTablePrtyNo()">Property No.</th>
                    <th scope="col">Location</th>
                    <th scope="col">Cost</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Type</th>
                    <th scope="col" onclick="Dfurniture_sortTableDteOfPrchse()">Date of Purchase</th>
                    <th scope="col">
                        <div class="btn-group">
                            <a class="dropdown-toggle link-light link-offset-2 link-underline link-underline-opacity-0"
                                type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Status
                            </a>
                            <ul class="dropdown-menu">
                                <li onclick="Dfurniture_sortTableDteOfPrchse()"><a class="dropdown-item"
                                        href="#">functional</a></li>
                                <li onclick="Dfurniture_sortTableDteOfPrchse()"><a class="dropdown-item"
                                        href="#">non-functional</a></li>
                                <li onclick="Dfurniture_sortTableDteOfPrchse()"><a class="dropdown-item"
                                        href="#">repairable</a></li>
                            </ul>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>


                <?php

$incmtn = 1;
// SQL SELECT statement
$sql = "SELECT * FROM `dfurniture`";

// Prepare the SQL statement
$stmt = $conn->prepare($sql);

// Execute the statement
$stmt->execute();

// Fetch all rows as an associative array
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (count($rows) > 0) {
    foreach ($rows as $row) {
        echo "<tr class='line-content' data-rowid='", $incmtn ,"'>";
        echo "<td id='table", $incmtn , "content'>", $incmtn ,"</td>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['property_number']}</td>";
        echo "<td>{$row['location_inside_building']}</td>";
        echo "<td>{$row['cost']}</td>";
        echo "<td>{$row['quantity']}</td>";
        echo "<td>{$row['type']}</td>";
        echo "<td>{$row['date']}</td>";
        echo "<td>{$row['status']}</td>";
        echo "</tr>";
        $incmtn++;
    }
}
?>


            </tbody>
        </table>
    </div>





















    <?php require_once "includes/footer.php" ?>