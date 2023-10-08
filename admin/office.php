<?php require_once "includes/header.php" ?>
<title>Dashboard | Office</title>
</head>

<body>

    <?php require_once "includes/sidebar.php" ?>


















    <script> 
        $(document).ready(function () {
            $('.soRting_Table').each(function (col) {
                $(this).hover(
                        function () {
                            $(this).addClass('focus');
                        },
                        function () {
                            $(this).removeClass('focus');
                        }
                );
                $(this).click(function () {
                    if ($(this).is('.asc')) {
                        $(this).removeClass('asc');
                        $(this).addClass('desc selected');
                        sortOrder = -1;
                    } else {
                        $(this).addClass('asc selected');
                        $(this).removeClass('desc');
                        sortOrder = 1;
                    }
                    $(this).siblings().removeClass('asc selected');
                    $(this).siblings().removeClass('desc selected');
                    var arrData = $('table').find('tbody >tr:has(td)').get();
                    arrData.sort(function (a, b) {
                        var val1 = $(a).children('td').eq(col).text().toUpperCase();
                        var val2 = $(b).children('td').eq(col).text().toUpperCase();
                        if ($.isNumeric(val1) && $.isNumeric(val2))
                            return sortOrder == 1 ? val1 - val2 : val2 - val1;
                        else
                            return (val1 < val2) ? -sortOrder : (val1 > val2) ? sortOrder : 0;
                    });
                    $.each(arrData, function (index, row) {
                        $('tbody').append(row);
                    });
                });
            });
        });
        

 
        // Date Sorting Start
        function convertDate(d) {
            var p = d.split("/");
            return +(p[2] + p[1] + p[0]);
        }

        function sortTableDteOfPrchse_ASCRoutine(X) {
            var tbody = document.querySelector("#Dfurniture_Table tbody");
            // get trs as array for ease of use
            var rows = [].slice.call(tbody.querySelectorAll("tr"));
            rows.sort(function(a, b) {
                return convertDate(a.cells[7].innerHTML) - convertDate(b.cells[7].innerHTML);
            });
            if (X == "asc") {
                rows.forEach(function(v) {
                    // console.log(v)
                    tbody.insertBefore(v, v.parentChild); // note that .appendChild() *moves* elements
                });
            }
            if (X == "desc") {
                rows.forEach(function(v) {
                    // console.log(v)
                    tbody.insertBefore(v, tbody.firstChild); // note that .appendChild() *moves* elements
                });
            }
        }
        var considered = true;
        console.log("outsidefalse");
        function Dfurniture_sortTableDteOfPrchse() {    
            if (considered == true) {
                console.log("insidetrue");
                sortTableDteOfPrchse_ASCRoutine("asc");
                considered = false;
            } else {
                sortTableDteOfPrchse_ASCRoutine("desc");
                console.log("insidefalse"); 
                considered = true;
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
                    <th class="soRting_Table" scope="col">No.</th>
                    <th class="soRting_Table" scope="col">Equipment Name</th>
                    <th class="soRting_Table" scope="col">Property No.</th>
                    <th class="soRting_Table" scope="col">Location</th>
                    <th class="soRting_Table" scope="col">Cost</th>
                    <th class="soRting_Table" scope="col">Quantity</th>
                    <!-- <th class="soRting_Table" scope="col">Type</th> -->
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
$sql = "SELECT * FROM `office_equipment`";

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
        // echo "<td>{$row['type']}</td>";
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