<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>录音，使我快乐</title>
</head>

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
    height:460px;
    width:150px;
    float:left;
    padding:10px;	      
}
#section {
    width:1000px;
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
#customers
{
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
	width:60%;
	border-collapse:collapse;
}
#customers td, #customers th 
{
	font-size:1em;
	border:1px solid #000000;
	padding:3px 7px 2px 7px;
}
#customers th 
{
	font-size:1.1em;
	text-align:center;
	padding-top:5px;
	padding-bottom:4px;
	background-color:#FFFFFF;
	color:#000000;
}
#customers tr.alt td 
{
	color:#000000;
	background-color:#eeeeee;
}

</style>

<body>
<?php
		$real_value = $_POST["id"];

		$test_value = $_POST["voice-c1"].$_POST["voice-c2"].$_POST["voice-c3"].$_POST["voice-c4"].$_POST["voice-c5"].$_POST["voice-l1"].$_POST["voice-l2"].$_POST["voice-l3"].$_POST["voice-l4"].$_POST["voice-l5"].$_POST["voice-w1"].$_POST["voice-w2"].$_POST["voice-w3"].$_POST["voice-w4"].$_POST["voice-w5"];

		exec("python calc_res.py $test_value $real_value",$ret,$rec);	
		//var_dump($real_value);
		//echo "</br>";
		//var_dump($test_value);
		//echo "</br>";
		$temp = explode(" ",$ret[4]);
		//var_dump($temp);
		for ($i=0;$i<count($temp);$i++)
		{
			$temp[$i] = intval($temp[$i]);
		}
		insert_voice($temp);
		$ret="";
		select_voice($ret);
?>

<?php
	function insert_voice($ret){
		$dsn="mysql:host=localhost;dbname=samp_db";
		$db = new PDO($dsn, 'root', '2016csltasr');
		 
		$insert_data ="insert into voice values(null,$ret[0],$ret[1],$ret[2],$ret[3],$ret[4],$ret[5])";
		$count = $db->exec($insert_data);
		$db = null;
	}
?>

<?php
	function select_voice($ret){
		$dsn="mysql:host=localhost;dbname=samp_db";
		$db = new PDO($dsn, 'root', '2016csltasr');
		 
		$select_data = "select * from voice ";
		$select_one_data = "select * from voice where id = (select max(id) from voice)";	
		$rs = $db->query($select_data);
		$rs_one =  $db->query($select_one_data);
		if(!$rs){die("inValid result!");}		
		$c_count = 0;
		$c_err = 0;
		$l_count = 0;
		$l_err = 0;
		$w_count = 0;
		$w_err = 0;
		
	//	echo "</br>";
		while($row = $rs->fetch()) 
		{
			$c_count += $row[1];
			$c_err += $row[2];
			$l_count += $row[3];
			$l_err += $row[4];
			$w_count += $row[5];
			$w_err += $row[6];
		}
		// echo "</br>";
	//	echo "$c_count,$c_err ,$l_count,$l_err ,$w_count ,$w_err </br> "; 
	//	echo (float)$c_err/(float)$c_count ,",  ",(float)$l_err/(float)$l_count  ,",  ",(float)$w_err/(float)$w_count; 
		$db = null; 
	}
?>
<?php
	function insert_real_data($ret){
		var_dump ($ret);
		 $link = mysqli_connect( 
         'localhost', /* The host to connect to 连接MySQL地址 */  
         'root',   /* The user to connect as 连接MySQL用户名 */  
         '2016csltasr', /* The password to use 连接MySQL密码 */  
         'samp_db');  /* The default database to query 连接数据库名称*/ 
		//$insert_data ="insert into real_data values(null,0,0,0,0,0,0)"; 
		$insert_data ="insert into voice values(null,$ret[0],$ret[1],$ret[2],$ret[3],$ret[4],$ret[5])";
		$rs = mysqli_query($link,$insert_data);
		if(!$rs){die("inValid result!");}		
		mysqli_close($link);
	}
?>

<?php
	function select_real_data(){ 
	$link = mysqli_connect( 
         'localhost', /* The host to connect to 连接MySQL地址 */  
         'root',   /* The user to connect as 连接MySQL用户名 */  
         'root', /* The password to use 连接MySQL密码 */  
         '2016csltasr');  /* The default database to query 连接数据库名称*/ 
		
		$select_data = "select * from real_data ";
		$rs = mysqli_query($link,$select_data); //执行sql
        if(!$rs){die("inValid result!");}
		
		while($row = mysqli_fetch_array($rs)) echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>"; 
		mysqli_free_result($rs); //关闭数据集
		mysqli_close($link);
		
	}
?>

<div id="header">
<h1>Trivial speech test</h1>
</div>
<div id="nav">
<p class="sansserif">cough</p>
<p class="sansserif">laugh</p>
<p class="sansserif">wei</p>
</div>
<div id="section">
<center>
<h2>感谢参与，您的测试结果为：</h2>
<table id="customers">
<tr>
  <th></th>
  <th>Cough</th>
  <th>Laugh</th>
  <th>Wei</th>
</tr>
<tr>
<td>total</td>
<td><?php echo $temp[0];?></td>
<td><?php echo $temp[2];?></td>
<td><?php echo $temp[4];?></td>
</tr>
<tr class="alt">
<td>error</td>
<td><?php echo $temp[1];?></td>
<td><?php echo $temp[3];?></td>
<td><?php echo $temp[5];?></td>
</tr>


</table>
<br>
<br>
<a href="index.php" > "继续测试" </a>
</center>

</body>
</html>
