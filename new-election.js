function createElection() {
	var id = document.getElementById("e_id").value;
	var startDate = document.getElementById("e_start_date").value;
	var endDate = document.getElementById("e_end_date").value;
	var type = document.getElementById("e_type").value;

	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200 ) {

			var st = this.responseText;
			if(st=="success")
			{
				window.alert("Election created successfully.");
				window.location.reload();
			}
			else {
				window.alert("Something went wrong.");
				console.log(st);
			} 
		}
	}
	xhttp.open("GET", "./create-election.php?id="
		+ id + "&" + "s_date=" + startDate
		+ "&" + "e_date=" + endDate +
		"&" + "type=" + type, true);
	xhttp.send();


}