$('#sendMail').click(function(){
	var account = $("#account").val();
	var mail=$("#email").val();
	$.ajax({type: "POST",url: forgetpws_api,xhrFields:{withCredentials: true},
	dataType: "JSON",
	data: {"account":account,"mail":mail,"operate":12},success:function(data){mui.toast(data.msg);},});});