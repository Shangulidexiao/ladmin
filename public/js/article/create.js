//实例化编辑器
var ue = UE.getEditor('article-content',{});

ue.ready(function(){
	$('.article-add').on('click',function(){
		var postData = {};
		postData.topId = $('#topId').val();
		postData.title = $('#title').val();
		postData.content = ue.getContent();

		if(parseInt(postData.topId) < 1){
			dialog({title: '提醒', okValue: '确定', content: '请选择一级类别', ok: true}).width(320).showModal();
			return false;
		}

		if(!postData.title){
			dialog({title: '提醒', okValue: '确定', content: '请填写文章标题', ok: true}).width(320).showModal();
			return false;
		}

		if(!postData.content){
			dialog({title: '提醒', okValue: '确定', content: '请填写文章内容', ok: true}).width(320).showModal();
			return false;
		}
	});
});

$('#subId').linkage({
    url:'/article/subCate?sel=0',
    relSel: '#topId' //关联的选择框
});

