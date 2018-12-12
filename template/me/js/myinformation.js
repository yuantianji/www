$('.dwaccount').val(uname);
$('.qqdw').val(qqnum);
$('.dwphone').val(uphone);
$('.baocun').click(function(){var username = $(".dwaccount").val();var qq=$(".qqdw").val();var phone=$(".dwphone").val();$.ajax({type: "POST",url: upinfo_api,xhrFields:{withCredentials: true},dataType: "JSON",data: {"username":username,"qq":qq,"phone":phone,"operate":5},success:function(data){mui.toast(data.msg);},});});

