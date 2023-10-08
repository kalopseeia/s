<?php require_once "includes/header.php" ?>
<title>Data Analytics</title>
</head>


<body>

    <?php require_once "includes/sidebar.php" ?>









    <div class="container">
        <div style="width: 400px; margin: 0 auto;">
            <canvas id="myBarChart" width="400" height="200"></canvas>
        </div>
        <div style="width: 400px; margin: 0 auto;">
            <canvas id="myPieChart" width="400" height="200"></canvas>
        </div>
    </div>

























    <?php

$resultArray = [];

$tables = [
    'furniture_equipment',
    'office_equipment',
    'electrical_equipment',
    'utilities_equipment',
];


foreach ($tables as $table) {

    $sql = "SELECT * FROM `$table`";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($rows) > 0) {
        foreach ($rows as $row) {
            $resultArray[] = $row['status'];
        }
    }
}

// echo '<pre>';
// // echo $resultArray;
// print_r($resultArray); // Use var_dump($resultArray) for more detailed output
// echo '</pre>';

// foreach ($resultArray as $fruit) {
//     echo $fruit . "<br>";
// }

$resultArrayJSON = json_encode($resultArray);

echo $resultArrayJSON;
?>



    <script>
        // Define a JavaScript variable and assign the JSON-encoded data
        var jsResultArray = <?php echo $resultArrayJSON; ?> ;

        // Now, jsResultArray contains the data as a JavaScript array
        console.log(jsResultArray); // You can use console.log to inspect it in the browser's console


        // Generate random data for 4 school rooms with passed and failed students
        const randomData = () => Math.floor(Math.random() * 50);

        const functionls = [];
        const non_function = [];
        const repairable = [];

        for (let i = 0; i < 4; i++) {
            functionls.push(randomData());
            non_function.push(randomData());
            repairable.push(randomData());
        }
        console.log(functionls);

        // Create a bar chart
        const dataBar = {
            labels: ["Room 1", "Room 2", "Room 3", "Room 4"],
            datasets: [{
                    label: "Functional",
                    data: functionls,
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                },
                {
                    label: "Non-Functional",
                    data: non_function,
                    backgroundColor: 'rgba(255, 165, 0, 0.5)',
                    borderColor: 'rgba(255, 165, 0, 1)',
                    borderWidth: 1
                },
                {
                    label: "Repairable",
                    data: repairable,
                    backgroundColor: 'rgba(90, 90, 90, 0.5)',
                    borderColor: 'rgba(90, 90, 90, 1)',
                    borderWidth: 1
                }
            ]
        };

        const ctxx = document.getElementById('myBarChart').getContext('2d');

        const myBarChart = new Chart(ctxx, {
            type: 'bar',
            data: dataBar,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });














        // Generate random data for passed and failed students
        const randomPassed = Math.floor(Math.random() * 50);
        const randomFailed = Math.floor(Math.random() * 50);

        // Create a pie chart
        const dataPie = {
            labels: ["Passed", "Failed"],
            datasets: [{
                data: [randomPassed, randomFailed],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.5)', // Color for Passed
                    'rgba(255, 99, 132, 0.5)' // Color for Failed
                ]
            }]
        };

        const ctx = document.getElementById('myPieChart').getContext('2d');

        const myPieChart = new Chart(ctx, {
            type: 'pie',
            data: dataPie,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'top',
                }
            }
        });
    </script>





    <?php require_once "includes/footer.php" ?>