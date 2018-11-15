;$(function(){
    $('#defaultForm').bootstrapValidator({
        message: '请检查填入的内容',
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: '文章类别名必须填写'
                    }
                }
            },
            orderBy: {
                validators: {
                    digits: {
                        message: '排序必须是数字'
                    }
                }
            }
        }
    });
});