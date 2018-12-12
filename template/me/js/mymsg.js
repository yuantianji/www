mui.init();
$('.dingwei').on('swipe',function () {var index = $(".dingwei").index(this);messageid = $(".dwid").eq(index).text();});
(function($){$('#OA_task_1').on('tap', '.mui-btn', function(event) {var elem = this;var li = elem.parentNode.parentNode;mui.confirm('确认删除该留言？', '吃饭吧', btnArray, function(e) {if (e.index == 0) {delmsg();li.parentNode.removeChild(li);}else{setTimeout(function() {$.swipeoutClose(li);}, 0);}});});var btnArray = ['确认', '取消'];})(mui);
function delmsg(){$.ajax({type: "POST",url: delmsg_api,xhrFields:{withCredentials: true},dataType: "JSON",data: {"messageid":messageid,"operate":10},success:function(data){mui.toast(data.msg);if(data.code==0){window.parent.frames[1].location.reload();}},});}
