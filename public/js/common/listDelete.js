;$(function(){
    //列表页删除单条数据
    $('.desgin-delete').on('click',function(){
        //获取要删除Id
        var deleteId = $(this).attr('data-id');
        dialog({title: '删除提醒',
            okValue: '确定',
            cancelValue: '取消',
            content: '你确认删除该条数据吗？',
            ok: function () { 
                var token = $('input[name="_token"]').val();
                var deleteUrl = $('input[name="delete-url"]').val();
                var url = deleteUrl + '/' + deleteId;
                var deleteData = {
                    _token:token,
                    _method:'DELETE'
                };
                $.post(url,deleteData,function(res){
                    if(res.status !== 1){
                        dialog({title: '删除提醒',
                                okValue: '确定',
                                content: '删除失败,请检查网络'}).width(320).showModal();
                    }else{
                        location.reload();
                    }
                },'json');
            },
            cancel: function () {}
        }).width(320).showModal();
            
    });
    
    $('.select-all').on('click',function(){
        var selectClass = $(this).attr('data-select');
        if($(this).prop('checked')){
            $('.'+selectClass).prop('checked', true);
        }else{
            $('.'+selectClass).prop('checked', false);
        }
    });
    
    $('.select-one').on('click',function(){
        var selectClass = $(this).attr('data-select');
        var num = $('input[data-select="'+selectClass+'"]').length;
        var selectNum = $('input[data-select="'+selectClass+'"]:checked').length;
        if(num === selectNum){
            $('.'+selectClass).prop('checked', true);
        }else{
            $('.'+selectClass).prop('checked', false);
        }
    });
    
    $('.delete-more').on('click',function(){
        var ids = [];
        $('.select-one:checked').each(function(){
            ids.push($(this).val());
        });
        if(ids.length < 1){
            dialog({title: '信息提示',
                okValue: '确定',
                content: '请选择要删除的数据！',
                ok: function () {}
            }).width(320).showModal();
            return;
        }
        dialog({title: '批量删除提醒',
            okValue: '确定',
            cancelValue: '取消',
            content: '你确认删除你选择的数据吗？',
            ok: function () { 
                var token = $('input[name="_token"]').val();
                var deleteAllUrl = $('input[name="delete-all-url"]').val();
                var url = deleteAllUrl;
                var deleteData = {
                    _token:token,
                    ids:ids
                };
                $.post(url,deleteData,function(res){
                    if(res.status !== 1){
                        dialog({title: '删除提醒',
                                okValue: '确定',
                                content: '删除失败,请检查网络'}).width(320).showModal();
                    }else{
                        location.reload();
                    }
                },'json');
            },
            cancel: function () {}
        }).width(320).showModal();
    });
    
});