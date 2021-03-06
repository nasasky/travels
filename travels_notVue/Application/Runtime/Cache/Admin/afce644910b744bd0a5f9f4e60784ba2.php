<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>编辑线路-费用不含</title>
    

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
    <style>
        .bar {
            width: 65em;
            height: 3em;
            border-bottom: 1px solid #0053AA;
        }
        .bar .bar_list{
            float: left;
            border: 1px solid #0053AA;
            border-top-left-radius: 0.25em;
            border-top-right-radius: 0.25em;
            border-bottom: 0 solid #0053AA;
            margin-right: 0.25em;
            line-height:3em;
            cursor: pointer;
        }
        .bar .bar_list .bar_link{
            display: inline-block;
            padding-left: 1em;
            padding-right: 1em;
            font-size: 1em;
            color: #0053AA;
            text-decoration:none;
        }
        .bar .bar_list .bar_link:hover{
            font-weight: 700;
        }
        .current{
            font-weight: 700;
            background-color: #d1d3d5;
        }
        .Huifold .item h4 {
            background-color: #ddd;
        }
    </style>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 线路管理 <span class="c-gray en">&gt;</span> 编辑线路 </nav>
<div class="mt-20 ml-40" >
    <ul class="bar ml-20">
        <li class="bar_list"><a class="bar_link" href="/Admin/Line/base_info/id/<?php echo ($lineid); ?>">基本信息</a></li>
        <li class="bar_list"><a class="bar_link" href="/Admin/Line/line_image/id/<?php echo ($lineid); ?>">轮播图</a></li>
        <li class="bar_list"><a class="bar_link" href="/Admin/Line/line_journey/id/<?php echo ($lineid); ?>">行程介绍</a></li>
        <li class="bar_list"><a class="bar_link" href="/Admin/Line/money_include/id/<?php echo ($lineid); ?>">费用包含</a></li>
        <li class="bar_list current"><a class="bar_link" href="/Admin/Line/not_include/id/<?php echo ($lineid); ?>">费用不含</a></li>
        <li class="bar_list"><a class="bar_link" href="/Admin/Line/notice/id/<?php echo ($lineid); ?>">预订须知</a></li>
        <li class="bar_list"><a class="bar_link" href="/Admin/Line/reference/id/<?php echo ($lineid); ?>">推荐活动</a></li>
        <li class="bar_list"><a class="bar_link" href="/Admin/Line/time_price/id/<?php echo ($lineid); ?>">团期价格</a></li>
    </ul>
    <div class="mt-20 mb-40 ml-20">
        <span class="ml-20" style="font-size: 16px">线路编号：<?php echo ($lineid); ?></span>
        <form action="/Admin/Line/not_include?ac=edit" method="post">
            <input type="hidden" name="id" value="<?php echo ($lineid); ?>"/>
            <table class="table table-border table-bordered table-hover" style="width: 60em">
                <tr>
                    <th class="text-r">外宾附加费：</th>
                    <td>
                        <p>
                            <input type="checkbox" name="foreign" value="1" style="zoom:120%;"/>
                            <input name="foreign_fee" style="border:0;width: 194px" readonly="readonly" value="外宾（不包括港澳台地区）需要支付"/>
                            <input type="text" name="foreign_note" placeholder="具体币种及金额在这里披露" value="<?php echo ($not_include["foreign"]["foreign_note"]); ?>" style="width: 160px" />
                            <input name="foreign_fee1" style="border:0;width: 300px" readonly="readonly" value="的差价，请在后续附加产品页面中选择外宾附加费选项"/>
                        </p>
                        <p>
                            <input type="checkbox" name="foreign1" value="1" style="zoom:120%;"/>
                            <input name="foreign1_fee" style="border:0;width: 190px" readonly="readonly" value="外宾（包括港澳台地区）需要支付"/>
                            <input type="text" name="foreign1_note" placeholder="具体币种及金额在这里披露" value="<?php echo ($not_include["foreign"]["foreign1_note"]); ?>" style="width: 160px" />
                            <input name="foreign1_fee1" style="border:0;width: 300px" readonly="readonly" value="的差价，请在后续附加产品页面中选择外宾附加费选项"/>
                        </p>
                        <p>
                            <input type="checkbox" name="foreign2" value="1" style="zoom:120%;"/>
                            <input name="foreign2_fee" style="border:0;width: 610px" readonly="readonly" value="本产品的起价适用持中国居民身份证或中国护照的游客，持其他国家或地区证件的游客请选择对应的选项补足差额"/>
                        </p>
                    </td>
                </tr>
                <tr>
                    <th class="text-r">单房差：</th>
                    <td>
                        <p>
                            <input type="checkbox" name="room" value="1" style="zoom:120%;"/>
                            <input name="room_fee" style="border:0;width: 40px" readonly="readonly" value="单房差"/>，
                            <input type="text" name="room_note" style="width: 400px" placeholder="例如注明:不提供自然单间，若产生单男男女则需补齐单房差" value="<?php echo ($not_include["room"]["room_note"]); ?>" />
                        </p>
                    </td>
                </tr>
                <tr>
                    <th class="text-r">其它：</th>
                    <td>
                        <p style="float: left;height:70px;line-height: 70px">
                            <input type="checkbox" name="other" value="1" style="zoom:120%;"/>
                        </p>
                        <p style="float: left">
                            <textarea name="other_fee" rows="5" cols="98" placeholder="费用中未含的其它税费描述"><?php echo ($not_include["other"]["other_fee"]); ?></textarea>
                        </p>
                    </td>
                </tr>
                <tr>
                    <th class="text-r">补充：</th>
                    <td>
                        <?php if($des_type == 3): ?><p>
                                <input type="checkbox" name="extra5" value="1" style="zoom:120%;"/>
                                <input name="extra5_fee" style="border:0;width: 600px" readonly="readonly" value="出入境个人物品海关征税，超重行李的托运费、保管费"/>
                            </p><?php endif; ?>
                        <p>
                            <input type="checkbox" name="extra1" value="1" style="zoom:120%;"/>
                            <input name="extra1_fee" style="border:0;width: 600px" readonly="readonly" value="因交通延阻、罢工、天气、飞机、机器故障、航班取消或更改时间等不可抗力原因所导致的额外费用"/>
                        </p>
                        <p>
                            <input type="checkbox" name="extra2" value="1" style="zoom:120%;"/>
                            <input name="extra2_fee" style="border:0;width: 600px" readonly="readonly" value="酒店内洗衣、理发、电话、传真、收费电视、饮品、烟酒等个人消费"/>
                        </p>
                        <p>
                            <input type="checkbox" name="extra3" value="1" style="zoom:120%;"/>
                            <input name="extra3_fee" style="border:0;width: 600px" readonly="readonly" value="“费用包含”中不包含的其它项目"/>
                        </p>
                        <p>
                            <input type="checkbox" name="extra4" value="1" style="zoom:120%;"/>
                            <input name="extra4_fee" style="border:0;width: 600px" readonly="readonly" value="丽江古城维护费80元/人"/>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="text-c">
                        <input class="btn btn-success radius" type="submit" value="&nbsp;&nbsp;&nbsp;&nbsp;保存&nbsp;&nbsp;&nbsp;&nbsp;">
                    </td>
                </tr>
            </table>
            </form>
    </div>
</div>

<script>
    $(document).ready(function () {
        $("input[name='foreign'][value='<?php echo ($not_include["foreign"]["foreign"]); ?>']").attr('checked', 'true');
        $("input[name='foreign1'][value='<?php echo ($not_include["foreign"]["foreign1"]); ?>']").attr('checked', 'true');
        $("input[name='foreign2'][value='<?php echo ($not_include["foreign"]["foreign2"]); ?>']").attr('checked', 'true');

        $("input[name='room'][value='<?php echo ($not_include["room"]["room"]); ?>']").attr('checked', 'true');

        $("input[name='other'][value='<?php echo ($not_include["other"]["other"]); ?>']").attr('checked', 'true');

        $("input[name='extra1'][value='<?php echo ($not_include["extra"]["extra1"]); ?>']").attr('checked', 'true');
        $("input[name='extra2'][value='<?php echo ($not_include["extra"]["extra2"]); ?>']").attr('checked', 'true');
        $("input[name='extra3'][value='<?php echo ($not_include["extra"]["extra3"]); ?>']").attr('checked', 'true');
        $("input[name='extra4'][value='<?php echo ($not_include["extra"]["extra4"]); ?>']").attr('checked', 'true');
        $("input[name='extra5'][value='<?php echo ($not_include["extra"]["extra5"]); ?>']").attr('checked', 'true');
    })

</script>

</body>
</html>