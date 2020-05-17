function setCookie(name, value, days) {
	var d = new Date;
	d.setTime(d.getTime() + 24*60*60*1000*days);
	document.cookie = name + "=" + value + ";path=/;expires=" + d.toGMTString();
}

function getCookie(name) {
	var v = document.cookie.match('(^|;) ?' + name + '=([^;]*)(;|$)');
	return v ? v[2] : "";
}
var f = function() {
	
	for( var i=1;i<= document.getElementById(this.getAttribute("idArticle")).value; i++)
	{
		setCookie("panier", getCookie("panier") + this.getAttribute("idArticle") + ",", 7);
		//document.cookie = document.cookie + this.getAttribute("idArticle") + ",";
	}
}


var elems = document.getElementsByClassName("ajout");
for (var i=0; i < elems.length; i++) elems[i].onclick = f;

