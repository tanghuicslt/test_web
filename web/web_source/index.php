<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>听录音，一身轻</title>

<style type="text/css">

p.thick {font-weight: bold}
p.serif{font-family:"Times New Roman",Georgia,Serif}
p.sansserif{font-family:Arial,Verdana,Sans-serif}

#header {
    background-color:black;
    color:white;
    text-align:center;
    padding:5px;
}
#nav {
    line-height:30px;
    background-color:#eeeeee;
    height:540px;
    width:150px;
    float:left;
    padding:10px;	      
}
#section1 {
    width:290px;
    float:left;
    padding:10px;	 	 
}
#section {
    width:70px;
    float:left;
    padding:10px;	 	 
}
#section2 {
    width:290px;
    float:left;
    padding:10px;	 	 
}
#section3 {
    width:290px;
    float:left;
    padding:10px;	 	 
}
#footer {
    background-color:black;
    color:white;
    clear:both;
    text-align:center;
   padding:10px;	 	 
}
a {  
    color: #339;  
    text-decoration: none;  
}  

  
/* button   
---------------------------------------------- */  
.button {  
    display: inline-block;  
    zoom: 1; /* zoom and *display = ie7 hack for display:inline-block */  
    *display: inline;  
    vertical-align: baseline;  
    margin: 0 2px;  
    outline: none;  
    cursor: pointer;  
    text-align: center;  
    text-decoration: none;  
    font: 14px/100% Arial, Helvetica, sans-serif;  
    padding: .5em 2em .55em;  
    text-shadow: 0 1px 1px rgba(0,0,0,.3);  
    -webkit-border-radius: .5em;   
    -moz-border-radius: .5em;  
    border-radius: .5em;  
    -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.2);  
    -moz-box-shadow: 0 1px 2px rgba(0,0,0,.2);  
    box-shadow: 0 1px 2px rgba(0,0,0,.2);  
}  

.bigrounded {  
    -webkit-border-radius: 2em;  
    -moz-border-radius: 2em;  
    border-radius: 2em;  
}  

/* color styles   
---------------------------------------------- */  
  
/* black */  
.black {  
    color: #d7d7d7;  
    border: solid 1px #333;  
    background: #333;  
    background: -webkit-gradient(linear, left top, left bottom, from(#666), to(#000));  
    background: -moz-linear-gradient(top,  #666,  #000);  
    filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#666666', endColorstr='#000000');  
}  
.black:hover {  
    background: #000;  
    background: -webkit-gradient(linear, left top, left bottom, from(#444), to(#000));  
    background: -moz-linear-gradient(top,  #444,  #000);  
    filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#444444', endColorstr='#000000');  
}  
.black:active {  
    color: #666;  
    background: -webkit-gradient(linear, left top, left bottom, from(#000), to(#444));  
    background: -moz-linear-gradient(top,  #000,  #444);  
    filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#000000', endColorstr='#666666');  
}  
</style>
</head>

<body>

<?php
	exec('python my_test.py ',$ret,$rec);
	$ar=explode(" ",$ret[0]);
	//var_dump($ar);
	//echo($rec);
    $dsn="mysql:host=localhost;dbname=samp_db";
    $db = new PDO($dsn, 'root', '2016csltasr');
    $select_data = "select * from rootinfo ";
    $rs = $db->query($select_data);
	$result_arr = $rs ->fetch();
	$db=null;
?>
<div id="header">
<h1>Trivial speech test</h1>
</div>
<div id="nav">
<p class="sansserif">cough</p>
<p class="sansserif">laugh</p>
<p class="sansserif">wei</p>
<br><br><br><br><br><br>
<script language=javascript>
function toopen(){
    if(document.getElementById("password").value=="<?php echo $result_arr[2];?>" && document.getElementById("firstname").value=="<?php echo $result_arr[1];?>"){
           document.forms[0].action="result.php";
           return true;
        }else{
        alert("用户名或密码不正确！")
        return false;
        }
    }
</script>
<form action="result.php" method="post">
<legend>管理员登录:</legend>
Name:<br>
<input type="text" id="firstname" name="firstname" size="15">
<br>
Password:<br>
<input type="password" id="password" name="password" size="15">
<br><br>
<input type="submit" value="Submit" onclick="return toopen();">
</form>
</div>

<div id="section1">
<h2><center>Cough</center></h2>
<p>
<form action="fav.php" method="post" name="argform" id="argform">
<input type="hidden" name="a" id="a" value="a"/>
<input type="submit" name="argsubmit" style="display:none"/>
以下的三组声音分别来自同一个人吗？

<br>
<br>
<input name="id" type="hidden" value="<?php echo $ret[1];?>"/>
<audio src="<?php echo $ar[0];?>" controls="controls">
您的浏览器不支持 audio 标签。
</audio>
<audio src="<?php echo $ar[1];?>" controls="controls">
您的浏览器不支持 audio 标签。
</audio>
<br> 
<center>
<br> 
<input name="voice-c1" type="radio" value="c1" />是
<input name="voice-c1" type="radio" value="c0" />否  
</center>

<br> 
<br>
<audio src="<?php echo $ar[2];?>" controls="controls">
您的浏览器不支持 audio 标签。
</audio>
<audio src="<?php echo $ar[3];?>" controls="controls">
您的浏览器不支持 audio 标签。
</audio>
<br> 
<center>
<br> 
<input name="voice-c2" type="radio" value="c1" />是 
<input name="voice-c2" type="radio" value="c0" />否
</center>

<br> 
<br>
<audio src="<?php echo $ar[4];?>" controls="controls">
您的浏览器不支持 audio 标签。
</audio>
<audio src="<?php echo $ar[5];?>" controls="controls">
您的浏览器不支持 audio 标签。
</audio>
<br> 
<center>
<br> 
<input name="voice-c3" type="radio" value="c1" />是 
<input name="voice-c3" type="radio" value="c0" />否  
</center>

<br> 
<br>
<audio src="<?php echo $ar[6];?>" controls="controls">
您的浏览器不支持 audio 标签。
</audio>
<audio src="<?php echo $ar[7];?>" controls="controls">
您的浏览器不支持 audio 标签。
</audio>
<br> 
<center>
<br> 
<input name="voice-c4" type="radio" value="c1" />是 
<input name="voice-c4" type="radio" value="c0" />否  
</center>

<br> 
<br>
<audio src="<?php echo $ar[8];?>" controls="controls">
您的浏览器不支持 audio 标签。
</audio>
<audio src="<?php echo $ar[9];?>" controls="controls">
您的浏览器不支持 audio 标签。
</audio>
<br> 
<center>
<br> 
<input name="voice-c5" type="radio" value="c1" />是 
<input name="voice-c5" type="radio" value="c0" />否  
</center>

<br>
<br> 
</p>
</div>

<div id="section">
<p>
</p>
</div>

<div id="section2" style="text-align:center">
<h2><center>Laugh</center></h2>
<p style="text-align:left">
以下的三组声音分别来自同一个人吗？

<br>
<br>
<audio src="<?php echo $ar[10];?>" controls="controls">
您的浏览器不支持 audio 标签。
</audio>
<audio src="<?php echo $ar[11];?>" controls="controls">
您的浏览器不支持 audio 标签。
</audio>
<br>
<center>
<input name="voice-l1" type="radio" value="l1" />是
<input name="voice-l1" type="radio" value="l0" />否  
</center>

<br>
<br> 
<audio src="<?php echo $ar[12];?>" controls="controls">
您的浏览器不支持 audio 标签。
</audio>
<audio src="<?php echo $ar[13];?>" controls="controls">
您的浏览器不支持 audio 标签。
</audio>
<br> 
<center>
<br> 
<input name="voice-l2" type="radio" value="l1" />是 
<input name="voice-l2" type="radio" value="l0" />否 
</center>

<br>
<br>
<audio src="<?php echo $ar[14];?>" controls="controls">
您的浏览器不支持 audio 标签。
</audio>
<audio src="<?php echo $ar[15];?>" controls="controls">
您的浏览器不支持 audio 标签。
</audio>
<br> 
<center>
<br> 
<input name="voice-l3" type="radio" value="l1" />是 
<input name="voice-l3" type="radio" value="l0" />否  
</center>

<br>
<br>
<audio src="<?php echo $ar[16];?>" controls="controls">
您的浏览器不支持 audio 标签。
</audio>
<audio src="<?php echo $ar[17];?>" controls="controls">
您的浏览器不支持 audio 标签。
</audio>
<br>
<center>
<br>
<input name="voice-l4" type="radio" value="l1" />是
<input name="voice-l4" type="radio" value="l0" />否  
</center>

<br>
<br>
<audio src="<?php echo $ar[18];?>" controls="controls">
您的浏览器不支持 audio 标签。
</audio>
<audio src="<?php echo $ar[19];?>" controls="controls">
您的浏览器不支持 audio 标签。
</audio>
<br>
<center>
<br>
<input name="voice-l5" type="radio" value="l1" />是
<input name="voice-l5" type="radio" value="l0" />否  
</center>

<br>
</p>

<br>

<script type="text/javascript">
function add(key,value)
{
    document.getElementById(key).value = value;
    document.getElementById("argform").submit();
}
</script>

<a href = "javascript:;" onclick ="add('a','aa');" class="button black bigrounded">提交</a>

</div>

<div id="section">
<p>
</p>
</div>

<div id="section3" style="text-align:right">
<h2><center>Wei</center></h2>
<p style="text-align:left">

以下的三组声音分别来自同一个人吗？
<br>
<br>
<audio src="<?php echo $ar[20];?>" controls="controls">
您的浏览器不支持 audio 标签。
</audio>
<audio src="<?php echo $ar[21];?>" controls="controls">
您的浏览器不支持 audio 标签。
</audio>
<br> 
<center>
<input name="voice-w1" type="radio" value="w1" />是
<input name="voice-w1" type="radio" value="w0" />否  
</center>

<br>
<br>
<audio src="<?php echo $ar[22];?>" controls="controls">
您的浏览器不支持 audio 标签。
</audio>
<audio src="<?php echo $ar[23];?>" controls="controls">
您的浏览器不支持 audio 标签。
</audio>
<br> 
<center>
<br> 
<input name="voice-w2" type="radio" value="w1" />是 
<input name="voice-w2" type="radio" value="w0" />否 
</center>

<br>
<br>
<audio src="<?php echo $ar[24];?>" controls="controls">
您的浏览器不支持 audio 标签。
</audio>
<audio src="<?php echo $ar[25];?>" controls="controls">
您的浏览器不支持 audio 标签。
</audio>
<br> 
<center>
<br> 
<input name="voice-w3" type="radio" value="w1" />是 
<input name="voice-w3" type="radio" value="w0" />否  
</center>

<br>
<br>
<audio src="<?php echo $ar[26];?>" controls="controls">
您的浏览器不支持 audio 标签。
</audio>
<audio src="<?php echo $ar[27];?>" controls="controls">
您的浏览器不支持 audio 标签。
</audio>
<br> 
<center>
<br>
<input name="voice-w4" type="radio" value="w1" />是
<input name="voice-w4" type="radio" value="w0" />否  
</center>

<br>
<br>
<audio src="<?php echo $ar[28];?>" controls="controls">
您的浏览器不支持 audio 标签。
</audio>
<audio src="<?php echo $ar[29];?>" controls="controls">
您的浏览器不支持 audio 标签。
</audio>
<br> 
<center>
<br>
<input name="voice-w5" type="radio" value="w1" />是
<input name="voice-w5" type="radio" value="w0" />否  
</center>

<br>
<br>

</p>
</form> 
</div>



<div id="footer">
<br>
</div>


<br>
<br> 

<!--<button value="submit" name="test_button" onclick="fn()">获取 </button>-->
<script>
    var inpArr = document.getElementsByTagName("input"),
	result = ""
	var arr="<?php echo $ar[1]; ?>"
    function fn(){
        result = "";
        for(var i=0;i<inpArr.length;i++){
            if(inpArr[i].checked){
                result+=inpArr[i].value+" ";
            }
        }
	     //document.getElementsById("test").value=result;	
    }
</script>
<?php
	  if(isset($_POST['test_button'])){
		  $a = $_POST['test_button'];
		  echo "<br>".$a."----php变量显示";
	  }
		    
?>



</body>
</html>

