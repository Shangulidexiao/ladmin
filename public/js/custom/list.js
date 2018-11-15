;$(function(){
    $('.add-menu').on('click',function(){
        var url = $(this).attr('data-url');
        var parent = $('.select-one:checked').val();
        var pId = 0;
        if(parent){
            pId = parent;
        }
        window.location.href= url + '?pId=' + pId;
    });
});