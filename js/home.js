function iFrameHeight(){
	var ifm1=document.getElementById("iframepage1");
	var ifm2=document.getElementById("iframepage2");
//	var ifm3=document.getElementById("iframepage3");
	var ifm4=document.getElementById("iframepage4");
	ifm1.height=document.documentElement.clientHeight-50;
	ifm2.height=document.documentElement.clientHeight-50;
//	ifm3.height=document.documentElement.clientHeight-50;
	ifm4.height=document.documentElement.clientHeight-50;}
window.onresize=function(){iFrameHeight();}
$(function(){iFrameHeight();});
