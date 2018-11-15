;$(function(){
    $('#defaultForm').bootstrapValidator({
        message: '请检查填入的内容',
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: '角色名必须填写'
                    }
                }
            },
            orderBy: {
                validators: {
                    notEmpty: {
                        message: '角色名必须填写'
                    },
                    integer:{
                        message: '请填写数字'
                    }
                }
            }
        }
    });
});


var setting = {
    check: {
        enable: true,
        chkboxType : { Y : "ps", N : "s" }
    },
    data: {
        simpleData: {
            enable: true
        }
    },            
    callback:{  
        onCheck:onCheck  
    } 
};

$(document).ready(function () {
    $.fn.zTree.init($("#authTree"), setting, zNodes);
});

function onCheck(event, treeId, treeNode) {
    var treeObj = $.fn.zTree.getZTreeObj(treeId);
    var nodes = treeObj.getCheckedNodes(true);
    
    var ids = [];
    for ( node in nodes) {
        ids.push(nodes[node].id)
    }
    $('input[name="authIds"]').val(ids.join(','));
}