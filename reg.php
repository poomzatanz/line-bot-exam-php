<?php
<html><head><title>เพิ่มข้อมูลหนังสือ</title></head>
<body >
<form enctype="multipart/form-data" name="save" method="post"
action="savebook.php">
<BR><BR>
<table width="650" border="1" bgcolor="#FFFFFF" align = "center">
<tr>
<td colspan="6" bgcolor = "#3399CC" align = "center" height="21">
<b>: : เพิ่มข้อมูลหนังสือ : </td>
</tr>
<tr>
<td width = "200">ชื่อ : </td><td width = "400">
<input type="text" name="BookID" size="10" maxlength="5"> </td>
</tr>
<tr >
<td width = "200" >นามสกุล :</td><td >
<input type="text" name="BookName" size="50" maxlength="50"> </td>
</tr>
</tr>
<tr >
<td width = "200" >Email :</td><td >
<input type="text" name="BookName" size="50" maxlength="50"> </td>
</tr>
</tr>
<tr >
<td width = "200" >ที่อยู่ :</td><td >
<textarea id="adress" name="adress" placeholder="Your address..." style="height:200px"></textarea> </td>
</tr>
</tr>
<tr >
<td width = "200" >เบอร์โทร :</td><td >
<input type="text" name="BookName" size="50" maxlength="50"> </td>
</tr>
</table>
<BR>
<div align = "center">
<input type="submit" name="Submit" value="บันทึกข้อมูล" style="cursor:hand">
<input type="reset" name="Reset" value="ยกเลิก" style="cursor:hand">
</div>
</body>
</html>
