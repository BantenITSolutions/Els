// JavaScript Document
var xmlhttp = false;

//check if using IE


//check if not using IE
if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
	xmlhttp = new XMLHttpRequest();
}

//function request
function makeRequest ( serverPage, objID, msgLoad ) {
	var obj = document.getElementById(objID);
	var msg = msgLoad;
	var t = new Date()
	xmlhttp.open("GET", serverPage+"&t="+t.getTime());
	xmlhttp.onreadystatechange = function() {
		if ( xmlhttp.readyState == 4 && xmlhttp.status == 200 ) {
			obj.innerHTML = xmlhttp.responseText;
		} else {
			obj.innerHTML = "<div align='center'>"+msg+"<br/><img src='image/loading.gif'></div>";
		}
	}
	xmlhttp.send(null);
}
