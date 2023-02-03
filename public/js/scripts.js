var searchVisibility = 0;
function searchForm(){
	if(searchVisibility === 0){
		document.getElementById('searchForm').style='display: flex'; 
		document.getElementById('searchButton').style='background: white; color: black;'
		searchVisibility = 1;
	}
	else{
		document.getElementById('searchForm').style='display: none'; 
		document.getElementById('searchButton').style='background: black; color: white;'
		searchVisibility = 0;
	}
}

function editProfile(){
	document.getElementById('editBtn').style='display: none';
	document.getElementById('userConf').style='display: none';
	document.getElementById('profileEdit').style='display: block';
}

/* mailbox */

function mailRecShow(){
	document.getElementById('mailboxRec').style='display: table';
	document.getElementById('menuRec').style='background: #E5E5E5';

	document.getElementById('mailboxSend').style='display: none';
	document.getElementById('menuSend').style='background: none';
}

function mailSendShow(){
	document.getElementById('mailboxRec').style='display: none';
	document.getElementById('menuRec').style='background: none';

	document.getElementById('mailboxSend').style='display: table';
	document.getElementById('menuSend').style='background: #E5E5E5';
}