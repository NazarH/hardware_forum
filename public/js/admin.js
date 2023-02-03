var int = 0;

function showMessage(id){
	if(int === 0){
		document.getElementById('message-'+id).style='display: block';
		document.getElementById('show-'+id).style='display: none';
		document.getElementById('hide-'+id).style='display: block';
		int = 1;
	} else {
		document.getElementById('message-'+id).style='display: none';
		document.getElementById('show-'+id).style='display: block';
		document.getElementById('hide-'+id).style='display: none';
		int = 0;
	}
}


function showConf(id){
	if(int === 0){
		document.getElementById('conf-'+id).style='display: block';
		document.getElementById('show-'+id).style='display: none';
		document.getElementById('hide-'+id).style='display: block';
		int = 1;
	} else {
		document.getElementById('conf-'+id).style='display: none';
		document.getElementById('show-'+id).style='display: block';
		document.getElementById('hide-'+id).style='display: none';
		int = 0;
	}
}

function showText(id){
	if(int === 0){
		document.getElementById('mess-'+id).style='display: block';
		document.getElementById('show-'+id).style='display: none';
		document.getElementById('hide-'+id).style='display: block';
		int = 1;
	} else {
		document.getElementById('mess-'+id).style='display: none';
		document.getElementById('show-'+id).style='display: block';
		document.getElementById('hide-'+id).style='display: none';
		int = 0;
	}
}