<!DOCTYPE html>
<html>

<head>
	<title>Export Kontak</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
	<script>
		function downloadCSV(csv, filename) {
			var fileCSV;
			var linkDonwload;

			// File CSV
			fileCSV = new Blob([csv], {
				type: "text/csv"
			});

			// Link download
			linkDonwload = document.createElement("a");

			// Nama file
			linkDonwload.download = filename;

			// Membuat link ke file
			linkDonwload.href = window.URL.createObjectURL(fileCSV);

			// Menyembunyikan link download
			linkDonwload.style.display = "none";

			// Menambahkan link ke DOM
			document.body.appendChild(linkDonwload);

			// Klik link download
			linkDonwload.click();
		}

		function exportTabelKeCSV(filename) {
			var csv = [];
			var baris = document.querySelectorAll("table tr");

			for (var i = 0; i < baris.length; i++) {
				var row = [],
					cols = baris[i].querySelectorAll("td, th");

				for (var j = 0; j < cols.length; j++)
					row.push(cols[j].innerText);

				csv.push(row.join(","));
			}

			// Download file CSV
			downloadCSV(csv.join("\n"), filename);
		}
	</script>
</head>

<body>
	<div class="col-lg-12 table-responsive">
		<br>
		<button class="btn btn-primary" onclick="exportTabelKeCSV('contacts.csv')">Download kontak CSV</button>
		<br><br>
		<p>setelah di download silahkan import file ke <a href="https://contacts.google.com/" class="btn btn-sm btn-success" target="_blank">Google Kontak</a> </p>
		<table class="table table-hover">
			<thead>
				<tr>
					<th hidden>Name,Given Name,Additional Name,Family Name,Yomi Name,Given Name Yomi,Additional Name Yomi,Family Name Yomi,Name Prefix,Name Suffix,Initials,Nickname,Short Name,Maiden Name,Birthday,Gender,Location,Billing Information,Directory Server,Mileage,Occupation,Hobby,Sensitivity,Priority,Subject,Notes,Language,Photo,Group Membership,E-mail 1 - Type,E-mail 1 - Value,Phone 1 - Type,Phone 1 - Value,Address 1 - Type,Address 1 - Formatted,Address 1 - Street,Address 1 - City,Address 1 - PO Box,Address 1 - Region,Address 1 - Postal Code,Address 1 - Country,Address 1 - Extended Address,Organization 1 - Type,Organization 1 - Name,Organization 1 - Yomi Name,Organization 1 - Title,Organization 1 - Department,Organization 1 - Symbol,Organization 1 - Location,Organization 1 - Job Description</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($get_basis as $b) { ?>
					<tr>
						<td hidden><?php echo $b->basisNama . "," . $b->basisNama . ",,,,,,,,,,,,,,,,,,,,,,,,,,,* myContacts,* Home," . $b->basisEmail . ",Home," . $b->basisPhone . ',,"' . ucwords(strtolower($b->provincesName)) . " " . ucwords(strtolower($b->regenciesName)) . " " . ucwords(strtolower($b->districtsName)) . " " . ucwords(strtolower($b->villagesName)) . '",,,,,,,,,' . $b->basisTempatkerja . ",," . $b->basisPekerjaan . ",,,,"; ?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</body>

</html>