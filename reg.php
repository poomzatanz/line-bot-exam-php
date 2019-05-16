
<html><head>
  <title>สมัครสมาชิก</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  </head>
<body >
<form enctype="multipart/form-data" name="save" method="post"
action="test.php">
<BR><BR>
<table width="650" border="1" bgcolor="#FFFFFF" align = "center">
<tr>
<td colspan="6" bgcolor = "#3399CC" align = "center" height="21">
<b>: : สมัครสมาชิก : </td>
</tr>
<tr>
<td width = "200">ชื่อ : </td><td width = "400">
<input type="text" name="name" size="50" maxlength="5"> </td>
</tr>
</tr>
<tr >
<td width = "200" >Email :</td><td >
<input type="text" name="mail" size="50" maxlength="50"> </td>
</tr>
  <td width = "200" >Password :</td><td >
<input type="password" name="pass" size="50" maxlength="50"> </td>
</tr>
</tr>
<tr >
<td width = "200" >ที่อยู่ :</td><td >
<textarea id="adress" name="add" placeholder="Your address..." style="width:300px; height:150px;"></textarea> </td>
</tr>
</tr>
<tr >
<td width = "200" >เบอร์โทร :</td><td >
<input type="text" name="tel" size="50" maxlength="50"> </td>
</tr>
<tr>
<td><input type="submit" name="Submit" value="บันทึกข้อมูล" style="cursor:hand"></td>
<td><input type="reset" name="Reset" value="ยกเลิก" style="cursor:hand"></td>
</tr>
</table>


<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId            : '1058925147635089,
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v3.0'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js#xfbml=1&version=v2.12&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Your customer chat code -->
<div class="fb-customerchat"
  attribution="setup_tool"
  page_id="2309274729393547"
  theme_color="#0084ff">
</div>
</div>

</body>

</html>
