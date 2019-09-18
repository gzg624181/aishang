$(function() {
    // 悬浮框
    if(!$('.met-demo-tool').length){
        var text_direction=M.user_name?' text-left':'',
            btn_padding=M.user_name?2:0,
            btn_text_show=M.user_name?'':'d-none',
            online_html = '<div class="met-online"><div class="met-online-body'+(M.user_name?' online':'')+(M.device_type=='m'?' hide':'')+'">';
        if(M.user_name){
            var user_info=JSON.parse($('textarea[name="user_info"]').val());
            if(user_info.principal_qq_link.indexOf('http')<0){
                var qq_url1='https://wpa.qq.com/msgrd?v=3&uin=',
                    qq_url2='&site=qq&menu=yes';
                if(M.device_type!='d' && !isWeiXin()){
                    qq_url1='mqqwpa://im/chat?chat_type=wpa&uin=';
                    qq_url2='&version=1&src_type=web';
                }
                user_info.principal_qq_link=qq_url1+user_info.principal+qq_url2;
            }
            if(user_info.principal_nickname) online_html+='<button class="btn btn-info w-100 rounded-0 p-2 text-left" style="cursor: default;"><i class="icon fa-address-book text-center mr-2"></i><small>客户经理：'+user_info.principal_nickname+'</small></button>';
            $('.head-login').data('mobile') && user_info.principal_qq && (online_html+='<a href="'+user_info.principal_qq_link+'" title="点击咨询" target="_blank" class="btn btn-info w-100 rounded-0 p-2 text-left"><i class="icon fa-qq text-center mr-2"></i><small>'+user_info.principal_qq+'</small></a>');
            if(user_info.principal_nickname) online_html+='<button class="btn btn-info w-100 rounded-0 p-2" title="客户经理微信" style="cursor: default;"><img src="'+user_info.principal_wx+'" width="100%" alt="客户经理微信"/></button>';
            if(user_info.principal_tel) online_html+='<a href="tel:'+user_info.principal_tel+'" class="btn btn-info w-100 rounded-0 p-2 text-left" style="cursor: default;"><i class="icon fa-phone text-center mr-2"></i><small>'+user_info.principal_tel+'</small></a>';
        }else{
            online_html+= '<button type="button" class="btn btn-info w-100 rounded-0 px-0 py-2'+text_direction+' btn-meqia" title="在线客服" onclick="_MEIQIA._SHOWPANEL()"><i class="icon fa-commenting"></i></button>';
                        // +'<a href="http://q.url.cn/abcBLi?_type=wpa&qidian=true" title="QQ客服" class="btn btn-info w-100 rounded-0 px-0 py-2'+text_direction+'" target="_blank"><i class="icon fa-qq"></i></a>'
                        // +'<button type="button" class="btn btn-info w-100 rounded-0 px-0 py-2'+text_direction+' btn-online-weixin" style="position: relative;" data-plugin="webuiPopover" data-trigger="hover" data-animation="pop" data-placement="left" data-width="150" data-padding="0"><i class="icon fa-weixin"></i></button>';
        }
        online_html+='<a href="https://u.mituo.cn/#/worklist" title="售后工单" class="btn btn-info w-100 rounded-0 px-'+btn_padding+' py-2'+text_direction+'" target="_blank"><i class="icon fa-wrench text-center"></i><small class="'+btn_text_show+' ml-2">售后工单</small></a>';
        // /*if($('#online-feed').length)*/ online_html+= '<button type="button" class="btn btn-info w-100 rounded-0 px-'+btn_padding+' py-2'+text_direction+' btn-online-feed" title="在线反馈" onclick="_MEIQIA._HIDEPANEL()" data-toggle="modal" data-target="#online-feed" data-backdrop="false"><i class="icon fa-pencil"></i></button>';
        online_html+= /*'<button type="button" class="btn btn-info w-100 rounded-0 px-'+btn_padding+' py-2'+text_direction+' met-scroll-top" title="返回顶部" onclick="goTop()"><i class="icon wb-chevron-up"></i></button>'
        +*/'<button type="button" class="btn btn-info w-100 rounded-0 px-'+btn_padding+' py-2'+text_direction+' met-online-min" title=""><i class="icon fa-chevron-right '+btn_text_show+' text-center mr-2"></i><small>收起</small></button>'
        +'</div><button type="button" class="btn btn-info rounded-0 px-2'+(M.device_type=='m'?'':' hide')+' met-online-show" title="展开"><i class="icon fa-commenting"></i></button></div>';
        $('body').append(online_html);
        var $met_online=$('.met-online');
        setTimeout(function(){
            if($met_online.height()%2) $met_online.height($met_online.height()+1);
        },500)
        $('.met-online-min').click(function(event) {
            $('.met-online-body').addClass('hide');
            $('.met-online-show').removeClass('hide');
        });
        $('.met-online-show').click(function(event) {
            $('.met-online-body').removeClass('hide');
            $(this).addClass('hide');
            if($met_online.height()%2) $met_online.height($met_online.height()+1);
        });
        /*打开反馈关闭美恰*/
        // $met_online.find('.btn-online-feed').click(function() {
        //     $('body').toggleClass('online-feed-modal-open');
        // });
        /*售前售后咨询*/
        $met_online.find('.btn-meqia').click(function() {
            // $('#online-feed').modal('hide');
            pyRegisterCvt1();
        });
        $met_online.find('.btn-online-weixin').webuiPopover({content:$('#met-weixin').data('content'),container:'.btn-online-weixin',padding:0});
    }
    // 美洽客服
    (function(m, ei, q, i, a, j, s) {
        m[i] = m[i] || function() {
            (m[i].a = m[i].a || []).push(arguments)
        };
        j = ei.createElement(q),
            s = ei.getElementsByTagName(q)[0];
        j.async = true;
        j.charset = 'UTF-8';
        j.src = 'https://static.meiqia.com/dist/meiqia.js?_=t';
        s.parentNode.insertBefore(j, s);
    })(window, document, 'script', '_MEIQIA');
    // _MEIQIA('assign',{
    //     agentToken:'f2faae5e00a3e18c2fae05229ef94af2' // 只有我会起作用
    //     // groupToken:'客服组的 Token' // 我被抛弃了
    // });
    _MEIQIA('entId', 1715);
    // if(!M.user_name && !Breakpoints.is('xs')){
    //     // 初始化成功后调用美洽 showPanel
    //     _MEIQIA('allSet', function(){
    //       _MEIQIA('showPanel');
    //     });
    // }
    // _MEIQIA('showPanel');
    if ($('.met-demo-tool').length) _MEIQIA('getInviting', yourFunction); //中断邀请，回调自定义邀请框
    _MEIQIA('withoutBtn', true);
});
function yourFunction(agentToken) {}
/*售前咨询*/
function pyRegisterCvt1() {
    var w = window,
        d = document,
        e = encodeURIComponent;
    var b = location.href,
        c = d.referrer,
        f, g = d.cookie,
        h = g.match(/(^|;)\s*ipycookie=([^;]*)/),
        i = g.match(/(^|;)\s*ipysession=([^;]*)/);
    if (w.parent != w) {
        f = b;
        b = c;
        c = f;
    };
    u = '//stats.ipinyou.com/cvt?a=' + e('5Kh.Ukh.Gzm9eAfOTHSD8L8SMow3Y0') + '&c=' + e(h ? h[2] : '') + '&s=' + e(i ? i[2].match(/jump\%3D(\d+)/)[1] : '') + '&u=' + e(b) + '&r=' + e(c) + '&rd=' + (new Date()).getTime() + '&e=';
    (new Image()).src = u;
}
// 判断是否是微信浏览器
function isWeiXin() {
    var ua = window.navigator.userAgent.toLowerCase();//window.navigator.userAgent属性包含了浏览器类型、版本、操作系统类型、浏览器引擎类型等信息，这个属性可以用来判断浏览器类型
    return ua.match(/MicroMessenger/i) == 'micromessenger'?true:false;//通过正则表达式匹配ua中是否含有MicroMessenger字符串
}