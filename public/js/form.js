function textWeight()     { document.getElementById("textArea").value+="<b></b>";   }
function textTilted()     { document.getElementById("textArea").value+="<i></i>";   }
function textEmphatic()   { document.getElementById("textArea").value+="<u></u>";   }
function textQuote()      { document.getElementById("textArea").value+="<blockquote></blockquote>";   }
function textCrossedOut() { document.getElementById("textArea").value+="<s></s>";   }
function textList()		  { document.getElementById("textArea").value+="<ul></ul>"; }
function textNumberList() { document.getElementById("textArea").value+="<ol></ol>"; }
function textListElement(){ document.getElementById("textArea").value+="<li></li>"; }

function textEmote1() { document.getElementById("textArea").value+="🙂"; }
function textEmote2() { document.getElementById("textArea").value+="🙁"; }
function textEmote3() { document.getElementById("textArea").value+="😟"; }
function textEmote4() { document.getElementById("textArea").value+="😉"; }
function textEmote5() { document.getElementById("textArea").value+="😕"; }
function textEmote6() { document.getElementById("textArea").value+="😐"; }
function textEmote7() { document.getElementById("textArea").value+="😁"; }
function textEmote8() { document.getElementById("textArea").value+="😎"; }
function textEmote9() { document.getElementById("textArea").value+="😛"; }
function textEmote10(){ document.getElementById("textArea").value+="😲"; }
function textEmote11(){ document.getElementById("textArea").value+="🙄"; }
function textEmote12(){ document.getElementById("textArea").value+="😭"; }
function textEmote13(){ document.getElementById("textArea").value+="🤔"; }
function textEmote14(){ document.getElementById("textArea").value+="🤨"; }
function textEmote15(){ document.getElementById("textArea").value+="😆"; }
function textEmote16(){ document.getElementById("textArea").value+="🤬"; }
function textEmote17(){ document.getElementById("textArea").value+="🤢"; }
function textEmote18(){ document.getElementById("textArea").value+="🤡"; }
function textEmote19(){ document.getElementById("textArea").value+="👍"; }
function textEmote20(){ document.getElementById("textArea").value+="👎"; }
function textEmote21(){ document.getElementById("textArea").value+="🍻"; }

function userQuote(userName, messDate){ 
	document.getElementById("textArea").value+='<blockquote>'+'<b>'+userName+'</b>'+':'+' '
	+messDate+'\n'+'\n'+'</blockquote>';
}

function userEvidence(userName){ 
	document.getElementById("textArea").value+='<b>'+userName+'</b>'; 
}

function sendData(){
	document.getElementById("preTextArea").value=document.getElementById("textArea").value;
	document.getElementById("preTitleField").value=document.getElementById("titleField").value;
	document.getElementById("submit").click();
}

function sendDataTopic(){
	document.getElementById("preTextArea").value=document.getElementById("textArea").value;
	document.getElementById("submit").click();
}

function sendResponde(){
	document.getElementById("submitResp").click();
}

function collectId(id){
	document.getElementById('idsArr').value+=id;
}