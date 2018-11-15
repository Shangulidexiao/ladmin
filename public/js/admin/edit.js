;$(function(){
    $('#defaultForm').bootstrapValidator({
        message: '请检查填入的内容',
        fields: {
            userName: {
                validators: {
                    notEmpty: {
                        message: '账号必须填写'
                    },
                    regexp:{
                        regexp:/[0-9a-zA-Z_]{6,20}/,
                        message: '必须是字母下划线，并且在6-20之间'
                    }
                }
            },
            trueName: {
                validators: {
                    notEmpty: {
                        message: '真实姓名必须填写'
                    }
                }
            },
            mobile: {
                validators: {
                    notEmpty: {
                        message: '手机号必须填写'
                    },
                    regexp:{
                        regexp:/1[0-9]{10}/,
                        message: '请填写正确的手机号'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: '邮箱地址不能为空'
                    },
                    emailAddress:{
                        message:'邮箱地址错误'
                    }
                }
            },
            password: {
                validators: {
                }
            },
            repassword: {
                validators: {
                    identical: {
                        field: 'password',
                        message: '两次密码输入不一样'
                    }
                }
            }
        }
    });
});