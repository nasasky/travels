<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>线路列表</title>
    

<script type="text/javascript" src="/Public/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/Public/H-ui.admin_v2.5/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/Public/lib/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="/Public/lib/layer/2.1/layer.js"></script>
<script type="text/javascript" src="/Public/H-ui.admin_v2.5/static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript" src="/Public/BJs/common.js"></script>


<!--[if lt IE 9]>
<script type="text/javascript" src="/Public/H-ui.admin_v2.5/lib/html5.js"></script>
<script type="text/javascript" src="/Public/H-ui.admin_v2.5/lib/respond.min.js"></script>
<script type="text/javascript" src="/Public/H-ui.admin_v2.5/lib/PIE_IE678.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/Public/H-ui.admin_v2.5/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/Public/H-ui.admin_v2.5/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/Public/H-ui.admin_v2.5/lib/Hui-iconfont/1.0.7/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/Public/H-ui.admin_v2.5/lib/icheck/icheck.css" />
<link rel="stylesheet" type="text/css" href="/Public/H-ui.admin_v2.5/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/Public/H-ui.admin_v2.5/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
    <script src="/Application/Admin/View/Public/laypage/laypage.js"></script>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 线路管理 <span class="c-gray en">&gt;</span> <?php echo ($des_type_name); ?>线路 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="/admin/line/linelist?type=<?php echo ($des_type); ?>" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>

<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="/admin/line/addline" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加线路</a></span> </div>

<input type="hidden" value="1" name="nowpage"/>

<form action="/admin/line/linelist" method="get" id="form">
    <input type="hidden" value="<?php echo ($des_type); ?>" name="type"/>
    <div class="page-container" style="padding-bottom: 0">
        <div class="pd-10">
            线路编号：&nbsp;
            <input type="text" name="lineid" class="input-text" value="<?php echo ($lineid); ?>"
                   style="width: 10em;" placeholder="按此查无需再加其它"/>&nbsp;&nbsp;&nbsp;&nbsp;
            线路类型：&nbsp;
            <select name="line_type" class="input-text" style="width: 10em">
                <option value="0">请选择</option>
                <option value="1" <?php if($line_type==1) echo "selected";?>>跟团游</option>
                <option value="2" <?php if($line_type==2) echo "selected";?>>自由行</option>
            </select>&nbsp;&nbsp;&nbsp;&nbsp;
            目的地：&nbsp;
            <select name="des" class="input-text" style="width: 10em">
                <option value="0">请选择</option>
                <?php if(is_array($des)): foreach($des as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>" <?php if($desid==$v['id']) echo "selected";?>><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
            </select>&nbsp;&nbsp;&nbsp;&nbsp;
            线路状态：&nbsp;
            <select name="status" class="input-text" style="width: 10em">
                <option value="0">请选择</option>
                <option value="1" <?php if($status==1) echo "selected";?>>编辑</option>
                <option value="2" <?php if($status==2) echo "selected";?>>上线</option>
                <option value="3" <?php if($status==3) echo "selected";?>>下线</option>
            </select>&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
        <div class="pd-10">
            出游天数：&nbsp;
            <input type="text" class="input-text" name="day_num" value="<?php echo ($day_num); ?>" id="day_num" style="width: 10em;" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')" onafterpaste="this.value=this.value.replace(/[^0-9]/g,'')" maxlength="2" placeholder="请输入1~20的整数"/>&nbsp;&nbsp;&nbsp;&nbsp;
            线路标题：&nbsp;
            <input type="text" name="title" class="input-text" value="<?php echo ($title); ?>"
                   style="width: 10em;" placeholder="名称关键字"/>&nbsp;&nbsp;&nbsp;&nbsp;
            专属OP：&nbsp;
            <select name="counselor" class="input-text" style="width: 10em">
                <option value="0">请选择</option>
                <?php if(is_array($op)): foreach($op as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>" <?php if($counselor==$v['id']) echo "selected";?>><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
            </select>&nbsp;&nbsp;&nbsp;&nbsp;

            &nbsp;&nbsp;供应商：&nbsp;
            <select name="supplier" class="input-text" style="width: 10em">
                <option value="0">请选择</option>
                <?php if(is_array($supplier)): foreach($supplier as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>" <?php if($supplierid==$v['id']) echo "selected";?>><?php echo ($v["company_name"]); ?></option><?php endforeach; endif; ?>
            </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i>
                查询
            </button>
        </div>
    </div>
</form>

<div class="page-container">
    <table class="table table-border table-bordered table-hover table-bg">
        <thead>
        <tr class="text-c">
            <th>线路编号</th>
            <th>线路类型</th>
            <th>线路标题</th>
            <th>出游天数</th>
            <th>出发地</th>
            <th>目的地</th>
            <th>最晚班期</th>
            <th>专属OP</th>
            <th>状态</th>
            <th>供应商线路标题</th>
            <th>供应商</th>
            <th>供应商OP</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if($lists): if(is_array($lists)): foreach($lists as $key=>$list): ?><tr class="text-c">
                    <td><?php echo ($list["id"]); ?></td>
                    <td>
                        <?php switch($list["line_type"]): case "1": ?>跟团游<?php break;?>
                            <?php case "2": ?>自由行<?php break;?>
                            <?php default: ?>未知类型<?php endswitch;?>
                    </td>
                    <td><?php echo ($list["title"]); ?></td>
                    <td><?php echo ($list["day_num"]); ?></td>
                    <td><?php echo ($list["start_palce"]); ?></td>
                    <td><?php echo ($list["des"]); ?></td>
                    <td>
                        <?php if($list["line_date"] == ''): ?>无
                        <?php else: ?>
                            <?php echo ($list["line_date"]); endif; ?>
                    </td>
                    <td><?php echo ($list["op"]); ?></td>
                    <td>
                        <?php switch($list["status"]): case "1": ?>编辑<?php break;?>
                            <?php case "2": ?>上线<?php break;?>
                            <?php case "3": ?>下线<?php break;?>
                            <?php case "4": ?>删除<?php break;?>
                            <?php default: ?>未知类型<?php endswitch;?>
                    </td>
                    <td><?php echo ($list["supplier_title"]); ?></td>
                    <td><?php echo ($list["company_name"]); ?></td>
                    <td><?php echo ($list["sop"]); ?></td>
                    <td>
                        <a href="/Admin/Line/time_price/id/<?php echo ($list["id"]); ?>">班期</a>
                        <a href="/Admin/Line/base_info/id/<?php echo ($list["id"]); ?>">编辑</a>
                        <?php switch($list["status"]): case "1": ?><a href="javascript:void(0);" onclick="change_status('<?php echo ($list["id"]); ?>',2)">上线</a><?php break;?>
                            <?php case "2": ?><a href="javascript:void(0);" onclick="change_status('<?php echo ($list["id"]); ?>',3)">下线</a><?php break;?>
                            <?php case "3": ?><a href="javascript:void(0);" onclick="change_status('<?php echo ($list["id"]); ?>',2)">上线</a><?php break; endswitch;?>
                    </td>
                </tr><?php endforeach; endif; ?>
            <tr>
                <td colspan="33" style="text-align: right">
                    <span class="l" style="margin-top: 4px;font-size: 14px">共有数据：<strong><?php echo ($count); ?></strong> 条，当前第&nbsp;<?php echo ($nowpage); ?>&nbsp;页，共&nbsp;<?php echo ($pages); ?>&nbsp;页</span>
                    <p style="float:right;margin-bottom: 0px;" id="laypage" style="text-align: right"><div id="laypage"></div></p>
                </td>
            </tr>
        <?php else: ?>
            <tr >
                <td colspan="11">
                    <div style="text-align:center"><span>抱歉，没有找到相关数据。</span></div>
                </td>
            </tr><?php endif; ?>
        </tbody>
    </table>
    <div id="cancel_modal" style="display:none;">
        <div style="margin-top:20px;text-align: center;">
            <div style="margin-top:20px;">
                产值：<input type="number" class="input-text" name="txt1" id="amount" step="0.01"
                          style="width:150px;height:30px;">&nbsp;&nbsp;元
            </div>

        </div>
    </div>
</div>




<script>
    // 判断输入的数字在1-20之间
    $("#day_num").blur( function(event) {
        var el = event.target;
        if(el.value>=20){
            el.value = 20;
        } else if (el.value <1) {
            el.value = '';
        }
    });

    // 上线或者下线
    function change_status(id,status) {
        var title='';
        switch(status){
            case 2: title='确认要上线吗?';break;
            case 3: title='确认要下线吗?';break;
        }
        layer.confirm(
            title,
            {btn: ['确定','取消']},
            function(index){
                var url = "/Admin/Line/line_status";
                $.get(url, {id:id, status:status}, function(data){
                    if(data) {
                        layer.msg('修改成功', {icon: 6,time:1000});
                        location.reload();
                    } else {
                        layer.msg('修改失败', {icon: 5,time:1000});
                    }
                })
            });
    }

</script>

</body>
<script>
    /**
     * 分页
     */
    laypage({
        cont: $('#laypage'), //容器。值支持id名、原生dom对象，jquery对象,
        pages: <?php echo ($pages); ?>, //总页数
        skip: true, //是否开启跳页
        groups: 5,//连续显示分页数
        curr: <?php echo ($nowpage); ?>,
        jump: function (obj, first) {
            //得到了当前页，用于向服务端请求对应数据
            if (!first) {
                nowpage = GetQueryString('nowpage') ? obj.curr : '2';
                location.href = changeURLArg(location.href, 'nowpage', nowpage)
            }
        }
    });
    /**
     * url 目标url
     * arg 需要替换的参数名称
     * arg_val 替换后的参数的值
     * return url 参数替换后的url
     */
    function changeURLArg(url, arg, arg_val) {
        var pattern = arg + '=([^&]*)';
        var replaceText = arg + '=' + arg_val;
        if (url.match(pattern)) {
            var tmp = '/(' + arg + '=)([^&]*)/gi';
            tmp = url.replace(eval(tmp), replaceText);
            return tmp;
        } else {
            if (url.match('[\?]')) {
                return url + '&' + replaceText;
            } else {
                return url + '?' + replaceText;
            }
        }
        return url + "" + arg + "" + arg_val;
    }
    /**
     * 得到url参数的值
     * @param name
     * @returns {*}
     * @constructor
     */
    function GetQueryString(name) {
        var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
        var r = window.location.search.substr(1).match(reg);
        if (r != null)return unescape(r[2]);
        return null;
    }
</script>
</html>