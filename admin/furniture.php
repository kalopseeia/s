<?php require_once "includes/header.php" ?>
<title>Dashboard | Furniture</title>
</head>


<body>

    <?php require_once "includes/sidebar.php" ?>


















    <script>
        // var people, asc1 = 1,
        //     asc2 = 1,
        //     asc3 = 1;
        // window.onload = function() {
        //     people = document.getElementById("people");
        // }

        // function sort_table(tbody, col, asc) {
        //     var rows = tbody.rows,
        //         rlen = rows.length,
        //         arr = new Array(),
        //         i, j, cells, clen;
        //     // fill the array with values from the table
        //     for (i = 0; i < rlen; i++) {
        //         cells = rows[i].cells;
        //         clen = cells.length;
        //         arr[i] = new Array();
        //         for (j = 0; j < clen; j++) {
        //             arr[i][j] = cells[j].innerHTML;
        //         }
        //     }
        //     // sort the array by the specified column number (col) and order (asc)
        //     arr.sort(function(a, b) {
        //         return (a[col] == b[col]) ? 0 : ((a[col] > b[col]) ? asc : -1 * asc);
        //     });
        //     // replace existing rows with new rows created from the sorted array
        //     for (i = 0; i < rlen; i++) {
        //         rows[i].innerHTML = "<td>" + arr[i].join("</td><td>") + "</td>";
        //     }
        // }




        function Dfurniture_sortNO() {
            // var rows = document.getElementById("Dfurniture_Table").getElementsByTagName("tr");
            // for (var i = 1; i < rows.length; i++) {
            //     var row = rows[i];
            //     // console.log(row);
            //     var Row_show = row.cells[0].innerHTML;
            //     // console.log(Row_show);
            // }
            var rows = document.getElementById("Dfurniture_Table").getElementsByTagName("tr");
            console.log(rows);
        }

        function Dfurniture_sortNOs() {
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






        // Date Sorting Start
        function convertDate(d) {
            var p = d.split("/");
            return +(p[2] + p[1] + p[0]);
        }

        function sortTableDteOfPrchse_ASCRoutine() {
            var tbody = document.querySelector("#Dfurniture_Table tbody");
            // get trs as array for ease of use
            var rows = [].slice.call(tbody.querySelectorAll("tr"));
            rows.sort(function(a, b) {
                return convertDate(a.cells[7].innerHTML) - convertDate(b.cells[7].innerHTML);
            });
            rows.forEach(function(v) {
                tbody.appendChild(v); // note that .appendChild() *moves* elements
            });
        }

        function Dfurniture_sortTableDteOfPrchse() {
            var considered = false;
            if (considered == false) {
                sortTableDteOfPrchse_ASCRoutine();
                var considered = true;
            } else {
                fiLter_Sttus_routine("all");
                considered = false;
            }
        }
        // Date Sorting End





        // Status Sorting Start
        function fiLter_Sttus_routine(X) {
            var rows = document.getElementById("Dfurniture_Table").getElementsByTagName("tr");
            for (var i = 1; i < rows.length; i++) {
                var row = rows[i];
                var Row_show = row.cells[8].innerHTML;
                // console.log(row);
                if (X === Row_show) {
                    // console.log(Row_show);
                    row.style.display = "";
                } else if (X === "all") {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            }
        }

        $(function() {
            $("li#f0").click(function() {
                fiLter_Sttus_routine("all");
            });
            $("li#f1").click(function() {
                fiLter_Sttus_routine("functional");
            });
            $("li#f2").click(function() {
                fiLter_Sttus_routine("non-functional");
            });
            $("li#f3").click(function() {
                fiLter_Sttus_routine("repairable");
            });
        });
        // Status Sorting END
    </script>




    <div class="container">
        <table class="table table-hover tblehover table-bordered" id="Dfurniture_Table">
            <thead class="table-dark">
                <tr>
                    <th scope="col" onclick="Dfurniture_sortNO()">No.</th>
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
                            <ul class="dropdown-menu dropdown-menu-dark" id="drpdwn_fnctnal">
                                <li id="f0"><a class="dropdown-item" href="#">All</a></li>
                                <li id="f1"><a class="dropdown-item" href="#">Functional</a></li>
                                <li id="f2"><a class="dropdown-item" href="#">Non-Functional</a></li>
                                <li id="f3"><a class="dropdown-item" href="#">Repairable</a></li>
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
        echo "<td>", date('d/m/Y', strtotime($row['date'])), "</td>";
        echo "<td value='{$row['status']}'>{$row['status']}</td>";
        echo "</tr>";
        $incmtn++;
    }
}
?>


            </tbody>
        </table>
    </div>





















    <?php require_once "includes/footer.php" ?>