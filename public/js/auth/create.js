;$(function(){
    $('#defaultForm').bootstrapValidator({
        message: '请检查填入的内容',
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: '菜单名必须填写'
                    }
                }
            },
            orderBy: {
                validators: {
                    digits: {
                        message: '排序必须是数字'
                    }
                }
            },
            url: {
                validators: {
                    notEmpty: {
                        message: '链接必须填写'
                    }
                }
            }
        }
    });
});