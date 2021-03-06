<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>管理员登录</title>
    <script type="text/javascript" src="/Public/js/laydate/laydate.js"></script>
    <script type="text/javascript" src="/Public/js/jquery-1.8.2.min.js"></script>
	<link type="text/css" rel="stylesheet" href="/Public/css/admin/travelInfo.css" media="all"/>
<style type="text/css">
.login_table {
	width:330px;
	font-size:14px;
	border-collapse:collapse;
	border:none;
}
.selectInfo{
	width:330px;
	margin:20px auto;
}
</style>
</head>
<body>
<h3 class="login_title">请选择导出条件</h3>

<div class="selectInfo">
    <form action="/index.php/Admin/TravelInfo/exportInfo" method="post">
        <table class="login_table">
            <tr>
            	<td>日期方式：</td>
            	<td>
            		<select name="dateType">
            			<option value="0">请选择</option>
                		<option value="1">按照出发日期</option>
                		<option value="2">按照返程日期</option>
         			</select>  
            	</td>
           	</tr>
            <tr>	
            	<td>起始日期：</td>
            	<td>
            		<input  type="text" name="date1" onclick="laydate()" class="laydate-icon"/>         	
            	</td>
            </tr>
            <tr>   
                <td>截止日期：</td>
                <td>
                	<input  type="text" name="date2" onclick="laydate()" class="laydate-icon"/>
                </td>
            </tr>
            <tr>	
            <td>线路名称：</td>
            <td><input  type="text" name="lineName"/></td>
            </tr>
            <tr>
            	<td>客人类型：</td>
            	<td>
            		<select name="visitorType">
            			<option value="0">全部</option>
                		<option value="1">散客</option>
                		<option value="2">包团</option>
         			</select>           	
            	</td>
            </tr>
            <tr>	
            	<td>线路类型：</td>
            	<td>
            		<select name="lineType">
            			<option value="0">全部</option>
                		<option value="1">周边</option>
                		<option value="2">国内</option>
                		<option value="3">出境</option>
                		<option value="4">港澳台</option>
         			</select>
         		</td>
         	</tr>
         	<?php if($_SESSION['adminDept']== '2'): ?><tr>
         			<td>OP：</td>
	            	<td>
	            		<select name="op">
	            			<option value="0">全部OP</option>
	            			<?php if(is_array($ops)): foreach($ops as $key=>$op): ?><option value="<?php echo ($op["id"]); ?>"><?php echo ($op["name"]); ?></option><?php endforeach; endif; ?>	                		
	         			</select>	
         			</td>
         		</tr><?php endif; ?>                              
            <tr>
            	<td colspan="2" >备注：1、可以输入单一条件进行查询，也可以输入多条件查询；2、线路名称可以输入关键字查询。</td>
            </tr>                
            <tr>
            	<td colspan="2"><input id="submit" type="submit" value="导出"/></td>
            </tr>
        </table>
    </form>
</div>


</body>
</html>