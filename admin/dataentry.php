<?php require_once "includes/header.php" ?>
<title>Data Entry</title>
</head>


<body>

	<?php require_once "includes/sidebar.php" ?>



	<style type="text/css">
		tr {
			cursor: pointer;
		}
	</style>
































	<script>
		function validateNumber(input) {
			// Remove any non-numeric characters using a regular expression
			input.value = input.value.replace(/[^0-9]/g, '');
		}

		function validateNumbers(input) {
			// Remove any non-numeric characters using a regular expression
			input.value = input.value.replace(/[^0-9]/g, '');
		}

		document.addEventListener('DOMContentLoaded', function() {
			truncTeRwFrstClm(15);
			document.getElementById('Dfurniture_Table').addEventListener('click', function(event) {
				if (event.target.nodeName === 'TD') {
					var trElement = event.target.closest('tr');
					var tdElements = trElement.querySelectorAll('td');

					var tdData = Array.from(tdElements).map(tdElement => tdElement.textContent);

					var fieldIds = [
						'MdalequipmentName',
						'MdlpropertyNumber',
						'Mdllocation',
						'Mdlcost',
						'Mdlquantity',
						'MdlequipmentType',
						'MdldateOfPurchase',
						'Mdlstatus'
					];

					for (var i = 0; i < fieldIds.length; i++) {
						var fieldName = fieldIds[i];
						var fieldValue = tdData[i + 1]; // Skip the first element
						if (fieldName === 'MdldateOfPurchase') {
							var isoDateString = fieldValue.split('/').reverse().join('-');
							document.getElementById(fieldName).value = isoDateString;
						} else {
							document.getElementById(fieldName).value = fieldValue;
						}
					}
				}
			});
		});




		function truncTeRwFrstClm(maxLength) {
			// Get all elements with id "rowNameTrncte"
			const elements = document.querySelectorAll('#rowNameTrncte');

			// Iterate through each element
			elements.forEach(element => {
				// Get the text content of the element
				const textContent = element.textContent;

				// Check if the text content exceeds the maximum length
				if (textContent.length > maxLength) {
					// Truncate the text content to the maximum length
					const truncatedText = textContent.substring(0, maxLength) + ' ...';

					// Update the text content of the element with the truncated text
					element.textContent = truncatedText;
				}
			});
		}



		$(document).ready(function() {
			$("#updateForm").on("click", function() {
				// Collect form data
				var updatetData = {
					equipmentName: $("#MdalequipmentName").val(),
					equipmentType: $("#MdlequipmentType").val(),
					propertyNumber: $("#MdlpropertyNumber").val(),
					quantity: $("#Mdlquantity").val()
					// location: $("#location").val(),
					// dateOfPurchase: $("#dateOfPurchase").val(),
					// cost: $("#cost").val(),
					// status: $("#status").val()
				};

				console.log(equipmentName);

				// Send an AJAX request to update the database
				$.ajax({
					type: "POST", // You can also use "GET" depending on your server setup
					url: "update_database.php", // Replace with the actual URL to your server-side script
					data: equipmentData,
					success: function(response) {
						// Handle the response from the server (e.g., show a success message)
						console.log("Data updated successfully: " + response);
					},
					error: function(error) {
						console.error("Error updating data: " + error);
					}
				});
			});

			$("li[data-filter]").click(function() {
				var filterValue = $(this).data("filter");
				console.log(filterValue);
				fiLter_Sttus_routine(filterValue);
			});


			// Sorting
			$(".soRting_Table").each(function(col) {
				$(this).hover(
					function() {
						$(this).addClass('focus');
					},
					function() {
						$(this).removeClass('focus');
					}
				);

				$(this).click(function() {
					var sortOrder = $(this).hasClass("asc") ? -1 : 1;
					$(".soRting_Table").removeClass("asc desc selected");
					$(this).toggleClass("asc selected", sortOrder === 1);
					$(this).toggleClass("desc selected", sortOrder === -1);

					var arrData = $('table').find('tbody >tr:has(td)').get();
					arrData.sort(function(a, b) {
						var val1 = $(a).children('td').eq(col).text().toUpperCase();
						var val2 = $(b).children('td').eq(col).text().toUpperCase();
						if ($.isNumeric(val1) && $.isNumeric(val2))
							return sortOrder * (val1 - val2);
						else
							return sortOrder * (val1.localeCompare(val2));
					});

					$.each(arrData, function(index, row) {
						$('tbody').append(row);
					});
				});
			});
		});

		function fiLter_Sttus_routine(X) {
			var rows = document.getElementById("Dfurniture_Table").getElementsByTagName("tr");
			for (var i = 1; i < rows.length; i++) {
				var row = rows[i];
				var Row_show = row.cells[8].innerHTML;
				row.style.display = (X === Row_show || X === "all") ? "" : "none";
			}
		}











		var considered = true;

		// Date Sorting Start
		function convertDate(d) {
			var p = d.split("/");
			return +(p[2] + p[1] + p[0]);
		}

		function sortTableDteOfPrchse_ASCRoutine(X) {
			var tbody = document.querySelector("#Dfurniture_Table tbody");
			var rows = [].slice.call(tbody.querySelectorAll("tr"));
			rows.sort(function(a, b) {
				return convertDate(a.cells[7].innerHTML) - convertDate(b.cells[7].innerHTML);
			});
			if (X == "asc") {
				rows.forEach(function(v) {
					tbody.insertBefore(v, v.parentChild);
				});
			}
			if (X == "desc") {
				rows.forEach(function(v) {
					tbody.insertBefore(v, tbody.firstChild);
				});
			}
		}

		function Dfurniture_sortTableDteOfPrchse() {
			sortTableDteOfPrchse_ASCRoutine(considered ? "asc" : "desc");
			considered = !considered;
		}
	</script>























	<!-- Modal start-->
	<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
		aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="container">
						<form id="equipmentForm" class="border" style="background-color: white;">
							<div class="row m-2">
								<div class="col">
									<label for="MdalequipmentName">Equipment Name</label>
									<input type="text" class="form-control" id="MdalequipmentName"
										placeholder="Equipment Name *">
								</div>
								<div class="col">
									<label for="MdlequipmentType">Type</label>
									<input type="text" class="form-control" id="MdlequipmentType" placeholder="Type *"
										disabled>
								</div>
							</div>
							<div class="row m-2">
								<div class="col">
									<label for="MdlpropertyNumber">Property Number </label>
									<input type="text" class="form-control" id="MdlpropertyNumber"
										placeholder="Property Number *">
								</div>
								<div class="col">
									<label for="Mdlquantity">Quantity</label>
									<input oninput="validateNumber(this)" type="text" class="form-control"
										id="Mdlquantity" placeholder="Quantity *">
								</div>
							</div>
							<div class="row m-2">
								<div class="col">
									<label for="Mdllocation">Location</label>
									<input type="text" class="form-control" id="Mdllocation" placeholder="Location *"
										required>
								</div>
								<div class="col">
									<label for="MdldateOfPurchase">Date of Purchase</label>
									<input type="date" class="form-control" id="MdldateOfPurchase" disabled
										placeholder="Date of Purchase *">
								</div>
							</div>
							<div class="row m-2">
								<div class="col">
									<label for="Mdlcost">Cost</label>
									<input oninput="validateNumbers(this)" type="text" class="form-control" id="Mdlcost"
										placeholder="Cost *">
								</div>
								<div class="col">
									<label for="Mdlstatus">Status</label>
									<select id="Mdlstatus" class="form-select">
										<option value="Functional">Functional</option>
										<option value="Non-Functional">Non-Functional</option>
										<option value="Repairable">Repairable</option>
									</select>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="modal-footer">
					<div class="col">
						<button type="button" class="btn btn-danger" data-bs-target="#deleteexampleModalToggle2"
							data-bs-toggle="modal">Delete</button>
					</div>
					<div class="col" align="right">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary" data-bs-target="#updateexampleModalToggle2"
							data-bs-toggle="modal">Update</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal close-->



	<!-- delete modal -->
	<div class="modal fade" id="deleteexampleModalToggle2" aria-hidden="true"
		aria-labelledby="deleteexampleModalToggleLabel2" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="deleteexampleModalToggleLabel2">Delete Record</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					Are you sure you want to delete this Record?
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" data-bs-target="#staticBackdrop"
						data-bs-toggle="modal">Cancel</button>
					<button class="btn btn-danger" aria-label="Close" data-bs-dismiss="modal">Delete</button>
				</div>
			</div>
		</div>
	</div>
	<!-- delete modal end -->


	<!-- update modal -->
	<div class="modal fade" id="updateexampleModalToggle2" aria-hidden="true"
		aria-labelledby="updateexampleModalToggleLabel2" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="deleteexampleModalToggleLabel2">Change Made</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					Do you want to save these changed?
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" data-bs-target="#staticBackdrop"
						data-bs-toggle="modal">Cancel</button>
					<button class="btn btn-primary" id="updateForm" aria-label="Close"
						data-bs-dismiss="modal">Update</button>
				</div>
			</div>
		</div>
	</div>
	<!-- update modal end -->





	<div class="container mt-2">
		<h3>
			<a href="additem.php" class="btn btn-primary">Add Item</a>
		</h3>
		<table class="table table-hover tblehover table-bordered" id="Dfurniture_Table">
			<thead class="table-dark">
				<tr>
					<th class="soRting_Table" scope="col">No.</th>
					<th class="soRting_Table" scope="col">Equipment Name</th>
					<th class="soRting_Table" scope="col">Property No.</th>
					<th class="soRting_Table" scope="col">Location</th>
					<th class="soRting_Table" scope="col">Cost</th>
					<th class="soRting_Table" scope="col">Quantity</th>
					<th class="soRting_Table" scope="col">Type</th>
					<th scope="col" onclick="Dfurniture_sortTableDteOfPrchse()">Date Purchase</th>
					<th scope="col">
						<div class="btn-group">
							<a class="dropdown-toggle link-light link-offset-2 link-underline link-underline-opacity-0"
								type="button" data-bs-toggle="dropdown" aria-expanded="false">
								Status
							</a>
							<ul class="dropdown-menu dropdown-menu-dark" id="drpdwn_fnctnal">
								<li class="dropdown-item" data-filter="all">All</li>
								<li class="dropdown-item" data-filter="Functional">Functional</li>
								<li class="dropdown-item" data-filter="Non-Functional">Non-Functional</li>
								<li class="dropdown-item" data-filter="Repairable">Repairable</li>
							</ul>
						</div>
					</th>
				</tr>
			</thead>
			<tbody>

				<?php
                
$NumberTble = 1;
$tables = [
    'furniture_equipment',
    'electrical_equipment',
    'office_equipment',
    'utilities_equipment',
];

foreach ($tables as $table) {
    
    $sql = "SELECT * FROM `$table`";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if (count($rows) > 0) {
        foreach ($rows as $row) {
            echo "<tr class='line-content' data-index='$NumberTble' data-bs-toggle='modal' data-bs-target='#staticBackdrop'>";
            // echo "<td data-fulltext='$NumberTble'>$NumberTble</td>";
            // echo "<td id='rowNameTrncte' data-fulltext='{$row['name']}'>{$row['name']}</td>";
            // echo "<td data-fulltext='{$row['property_number']}'>{$row['property_number']}</td>";
            // echo "<td data-fulltext='{$row['location_inside_building']}'>{$row['location_inside_building']}</td>";
            // echo "<td data-fulltext='{$row['cost']}'>{$row['cost']}</td>";
            // echo "<td data-fulltext='{$row['quantity']}'>{$row['quantity']}</td>";
            // echo "<td data-fulltext='{$row['type']}'>{$row['type']}</td>";
            // echo "<td data-fulltext='", date('d/m/Y', strtotime($row['date'])), "'>", date('d/m/Y', strtotime($row['date'])), "</td>";
            echo "<td data-fulltext='{$row['status']}' value='{$row['status']}'>{$row['status']}</td>";
            echo "</tr>";
            $NumberTble++;
        }
    }
}
?>


			</tbody>
		</table>
	</div>





















	<?php require_once "includes/footer.php" ?>