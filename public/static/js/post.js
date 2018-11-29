/**
 * 前端登录业务类
 */


var post = {
	check:function(){
		// 获取登录页面中的用户名和密码
		var password = $('input[name="password"]').val();

		if(!password){
			dialog.msg('不能为空！');
			return;
		}

		// 执行异步请求	$.post
		var url = '/index/index/post_check';
		var data = {'password':password};
		$.post(url,data,function(result){
			 if(result.status == 0){
			 	return dialog.msg('出错！')
			 }else{
			 	$("#copy_true").attr("data-clipboard-text",result.message); //修改text第一种方法
			 	
			 	// var testEle = document.getElementById("copy_true") //修改text第二种方法
				// testEle.setAttribute("data-clipboard-text",result.message); 
				
				// 修改h2标签内容
			 	var nv = document.getElementById("h2id");
				nv.innerHTML=result.message;

				// 修改button文字
			 	var nv = document.getElementById("copy_true");
				nv.innerHTML="复制";

			 	post.copy();
			 }
		},'JSON');

	},
	logout:function(){
		var username = document.getElementById("username").innerText;
		var url = '/public/admin/login/login_logout';
		var data = {'username':username};
		$.post(url,data,function(result){
			if (result.status == 1) {
				return dialog.msg_url(result.message,'/public/admin/login/index')
			}
		},'JSON');
	},
	copy:function(){
		var clipboard1 = new Clipboard(".copy");
		clipboard1.on("success", function(e) {layer.msg("复制成功");});
		clipboard1.on("error", function(e) {layer.msg("复制失败！请手动复制", {icon:2});});
	},
	regular:function(){
		// 正则url 返回域名
		var key = $('input[name="key"]').val();

		if(!key){
			dialog.msg('不能为空！');
			return;
		}

		// 执行异步请求	$.post
		var url = '/index/index/post_regular';
		var data = {'key':key};
		$.post(url,data,function(result){
			 if(result.status == 0){
			 	return dialog.msg('出错！')
			 }else{
			 	$("#copy_true").attr("data-clipboard-text",result.pass); //修改text第一种方法
			 	
			 	// var testEle = document.getElementById("h2id") //修改text第二种方法
				// testEle.setAttribute("data-clipboard-text",result.domain); 
				
				// 修改h2标签内容
			 	var nv = document.getElementById("h2id2");
				nv.innerHTML=result.domain;

			 	var nv = document.getElementById("h2id");
				nv.innerHTML=result.pass;

				// 修改button文字
			 	var nv = document.getElementById("copy_true");
				nv.innerHTML="复制";

			 	post.copy();
			 }
		},'JSON');
	}
}