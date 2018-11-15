/**
 * jquery 联动插件
 */

(function($){
    $.fn.linkage = function(options){
        var defaults = {
                url:        ''  //请求的数据URL
                ,topTxt:    '请选择' //默认的文本
                ,topVal:    '0' //默认的值
                ,initVal:   '0' //初始值
                ,relSel:    false //关联的选择框
                ,relRelSel:    false //受relSel影响的关联选择框
                ,relVal:    false //关联的选择框的选择值
                ,relRelVal:    false //受relSel影响的关联选择框值
                ,randStr:   false //请求是否添加随机字符，避免ajax缓存
                ,callBack:  function(){}
                ,change:''
        };
        this.options = $.extend(defaults, options);
        // 处理通过url赋值的选择框参数
            var relVal = this.options.url.match(/val\=(\d+)/);
            if (relVal != null) {
                this.options.relVal = relVal[1];
            }
            var relRelVal = this.options.url.match(/relRelVal\=(\d+)/);
            if (relRelVal != null) {
                this.options.relRelVal = relRelVal[1];
            }

            var nowObj = this;
            
            if(this.options.relSel){//是否级联上一级菜单
                $(this.options.relSel).change(function(){
                    nowObj.options.relVal = $(this).val();
                    if (nowObj.options.relRelSel != false) {
                        nowObj.options.relRelVal = $(nowObj.options.relRelSel).val();
                    }
                    getData(nowObj);
                });
            }
            if(this.options.relRelSel){//是否级联上一级菜单
                $(this.options.relRelSel).change(function(){
                    nowObj.options.relVal = false;
                    nowObj.options.relRelVal = $(this).val();
                    getData(nowObj);
                });
            }
            if (typeof this.options.change == 'function') {
                $(this).on('change', function(){
                    nowObj.options.change($(nowObj));
                });
            }
            getData(this);
    		return this;
    };
        var getData = function(obj){
            var options = obj.options;
            var url = options.url;

            // 清除旧数据
            url = url.replace(/val\=\d+/, '');
            url = url.replace(/relVal\=\d+/, '');

            // 附加新数据
            if(options.relVal){
                url += '&val=' + options.relVal;
            }
            if (options.relRelVal) {
                url += '&relVal=' + options.relRelVal;
            }
            if(options.randStr){
                url += '&r=' + Math.random();
            }
            $.get(url,function(html){
                //替换初始化值
                if(options.initVal){
                    html.replace("value='"+options.initVal+"'", "selected='selected' value='"+options.initVal+"'");
                }
                $(obj).html("<option value='" + options.topVal + "'>" + options.topTxt + "</option>" + html);
                options.callBack($(obj));
            });            
        };
})(jQuery);

