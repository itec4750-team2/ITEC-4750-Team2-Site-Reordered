function openNav() {
	document.getElementById("mySidenav").style.width = "250px";
	document.getElementById("main").style.marginLeft = "250px";
	document.getElementById("purpleBar").style.marginLeft = "250px";
	document.getElementsByClassName("indent").style.marginLeft = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
	document.getElementById("main").style.marginLeft= "0";
	document.getElementById("purpleBar").style.marginLeft= "0";
	document.getElementsByClassName("indent").style.marginLeft = "0";
}