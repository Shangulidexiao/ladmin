;$(function(){
    $('#defaultForm').bootstrapValidator({
        message: '请检查填入的内容',
        fields: {
            userName: {
                validators: {
                    notEmpty: {
                        message: '请填写登录名'
                    }
                }
            },
            nickName: {
                validators: {
                    notEmpty: {
                        message: '请填写昵称'
                    }
                }
            },
            trueName: {
                validators: {
                    notEmpty: {
                        message: '请填写姓名'
                    }
                }
            },
            email: {
                validators: {
                    emailAddress: {
                        message: '请填写正确的邮箱号'
                    },
                    notEmpty: {
                        message: '请填写邮箱号'
                    }
                }
            }
        }
    });
});