$(function(){

    //post提交
    $('.ajax-post').click(function(){
        var that = $(this).attr('target-form');

        var url = $('.'+that).attr('url');

        var data = $('.'+that).serialize();
        $.ajax({
            'type':'post',
            'url':url,
            'data':data,
            'headers':{'X-CSRF-TOKEN':$('meta[name="_token"]').attr('content')},
            'success':function(data){
                
                if(data.status){
                    layer.alert(data.msg+'页面将自动跳转~',{icon:6});
                    if(data.url){
                       setTimeout(function(){
                            location.href = data.url;
                        }, 1000) 
                    }else{
                        location.reload();
                    }
                }else{
                    layer.alert(data.msg,{icon:5});
                }
            },
            'error':function(data){
                // location.href="/page/not_found";
                alert(2);
            }
        })
    })
})


//导航高亮
function highlight_subnav(url){
    // url = url.toLowerCase().replace(".html","");
    var $subnav = $(".main-menu");
    $.each($(".main-menu a"), function(index, val) {
        if ($(this).attr("href").toLowerCase().substr(0, url.length) == url ) { 
            
            // var fpid = $(this).attr('pid');
            $(this).parent().addClass("active");
            $(this).parent().parent().parent().addClass("active opened active expanded has-sub");
            // $("li[fpid="+fpid+"]").addClass('active opened active expanded ');
            // browser_val = $('.browser_val').val();
            // // alert(browser_val);
            // switch(browser_val){
            //     case '1':
            //         var color = '#8B9DC3';
            //         break;
            //     case '2':
            //         var color = '#1C954F';
            //         break;
            //     case '3':
            //         var color = '#5F3D7E';
            //         break;
            //     case '4':
            //         var color = '#D23838';
            //         break;
            //     case '5':
            //         var color = '#F5C150';
            //         break;
            //     default:
            //         var color = '#3F4142';
            //         break;
            // }
                
            // $(this).css('background-color', color );
        }
    });
}