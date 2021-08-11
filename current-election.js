function startVoting(ref) {
	var eid = ref.getAttribute('data-eid');
	console.log(eid);

	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var st = this.responseText;
			if (st == "failure") {
				window.alert("Something went wrong.");
			} else if (st == "success") {
				window.alert("Voting started successfully.");
				window.location.reload();
			}
		}
	}
	xhttp.open("GET", "./start-voting.php?eid="+eid, true);
	xhttp.send();
}

function endVoting(ref) {
	var eid = ref.getAttribute("data-eid");

	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var st = this.responseText;
			if (st == "failure") {
				window.alert("Something went wrong.");
			} else if (st == "success") {
				window.alert("Voting ended successfully.");
				window.location.reload();
			}
		}
	}
	xhttp.open("GET", "./end-voting.php?eid="+eid, true);
	xhttp.send();
}


function declareResult(ref) {
	var eid = ref.getAttribute("data-eid");

	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var st = this.responseText;
			if (st == "failure") {
				window.alert("Something went wrong.");
			} else if (st == "success") {
				window.alert("Election results have been declared.");
				window.location.reload();
			}
		}
	}
	xhttp.open("GET", "./declare-voting.php?eid="+eid, true);
	xhttp.send();
}