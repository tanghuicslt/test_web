<!DOCTYPE html>
<html>
<body>
<?php
	
		$dsn="mysql:host=localhost;dbname=samp_db";
		$db = new PDO($dsn, 'root', '2016csltasr');
		 
		$select_data = "select * from voice order by id desc";
		$select_one_data = "select * from voice where id = (select max(id) from voice)";	
		$rs = $db->query($select_data);
		$rs_one =  $db->query($select_one_data);	
		$c_count = 0;
		$c_err = 0;
		$l_count = 0;
		$l_err = 0;
		$w_count = 0;
		$w_err = 0;
		
	//	echo "</br>";
	    $j = 0;
		
		while($row = $rs->fetch()) 
		{
			$c_count += $row[1];
			$c_err += $row[2];
			$l_count += $row[3];
			$l_err += $row[4];
			$w_count += $row[5];
			$w_err += $row[6];
			
			if ($j < 10){
				$arr_0[$j]=$row[0];
				$arr_1[$j]=$row[1];
				$arr_2[$j]=$row[2];
				$arr_3[$j]=$row[3];
				$arr_4[$j]=$row[4];
				$arr_5[$j]=$row[5];
				$arr_6[$j]=$row[6];
				
			}
			$j = $j +1;
		}
		$cough_err_r = round((float)$c_err/(float)$c_count*100,2);
		$laugh_err_r =  round((float)$l_err/(float)$l_count*100,2);
		$wei_err_r =  round((float)$w_err/(float)$w_count*100,2);
	
		$db = null; 

?>
<center>
<h1>Human test result</h1>
<br><br>
<table border="1" width="500">
<caption>总数与错误率</caption>
<tr>
  <td></td>
  <td>cough</td>
  <td>laugh</td>
  <td>wei</td>
</tr>
<tr>
  <td>total</td>
  <td><?php echo $c_count;?></td>
  <td><?php echo $l_count;?></td>
  <td><?php echo $w_count;?></td>
</tr>
<tr>
  <td>EER(%)</td>
  <td><?php echo $cough_err_r;?></td>
  <td><?php echo $laugh_err_r;?></td>
  <td><?php echo $wei_err_r;?></td>
</tr>
</table>
<br><br><br>
<table border="1" width="500">
<caption>最近10人的测试情况</caption>
<tr>
  <td></td>
  <th colspan="2">cough</th>
  <<th colspan="2">laugh</th>
  <th colspan="2">wei</th>
</tr>
<tr>
  <td></td>
  <td>total</td>
  <td>EER</td>
  <td>total</td>
  <td>EER</td>
  <td>total</td>
  <td>EER</td>
</tr>
<tr>
  <td><?php echo $arr_0[0];?></td>
  <td><?php echo $arr_1[0];?></td>
  <td><?php echo $arr_2[0];?></td>
  <td><?php echo $arr_3[0];?></td>
  <td><?php echo $arr_4[0];?></td>
  <td><?php echo $arr_5[0];?></td>
  <td><?php echo $arr_6[0];?></td>
</tr>
<tr>
  <td><?php echo $arr_0[1];?></td>
  <td><?php echo $arr_1[1];?></td>
  <td><?php echo $arr_2[1];?></td>
  <td><?php echo $arr_3[1];?></td>
  <td><?php echo $arr_4[1];?></td>
  <td><?php echo $arr_5[1];?></td>
  <td><?php echo $arr_6[1];?></td>
</tr>
<tr>
  <td><?php echo $arr_0[2];?></td>
  <td><?php echo $arr_1[2];?></td>
  <td><?php echo $arr_2[2];?></td>
  <td><?php echo $arr_3[2];?></td>
  <td><?php echo $arr_4[2];?></td>
  <td><?php echo $arr_5[2];?></td>
  <td><?php echo $arr_6[2];?></td>
</tr>
<tr>
  <td><?php echo $arr_0[3];?></td>
  <td><?php echo $arr_1[3];?></td>
  <td><?php echo $arr_2[3];?></td>
  <td><?php echo $arr_3[3];?></td>
  <td><?php echo $arr_4[3];?></td>
  <td><?php echo $arr_5[3];?></td>
  <td><?php echo $arr_6[3];?></td>
</tr>
<tr>
  <td><?php echo $arr_0[4];?></td>
  <td><?php echo $arr_1[4];?></td>
  <td><?php echo $arr_2[4];?></td>
  <td><?php echo $arr_3[4];?></td>
  <td><?php echo $arr_4[4];?></td>
  <td><?php echo $arr_5[4];?></td>
  <td><?php echo $arr_6[4];?></td>
</tr>
<tr>
  <td><?php echo $arr_0[5];?></td>
  <td><?php echo $arr_1[5];?></td>
  <td><?php echo $arr_2[5];?></td>
  <td><?php echo $arr_3[5];?></td>
  <td><?php echo $arr_4[5];?></td>
  <td><?php echo $arr_5[5];?></td>
  <td><?php echo $arr_6[5];?></td>
</tr>
<tr>
  <td><?php echo $arr_0[6];?></td>
  <td><?php echo $arr_1[6];?></td>
  <td><?php echo $arr_2[6];?></td>
  <td><?php echo $arr_3[6];?></td>
  <td><?php echo $arr_4[6];?></td>
  <td><?php echo $arr_5[6];?></td>
  <td><?php echo $arr_6[6];?></td>
</tr>
<tr>
  <td><?php echo $arr_0[7];?></td>
  <td><?php echo $arr_1[7];?></td>
  <td><?php echo $arr_2[7];?></td>
  <td><?php echo $arr_3[7];?></td>
  <td><?php echo $arr_4[7];?></td>
  <td><?php echo $arr_5[7];?></td>
  <td><?php echo $arr_6[7];?></td>
</tr>
<tr>
  <td><?php echo $arr_0[8];?></td>
  <td><?php echo $arr_1[8];?></td>
  <td><?php echo $arr_2[8];?></td>
  <td><?php echo $arr_3[8];?></td>
  <td><?php echo $arr_4[8];?></td>
  <td><?php echo $arr_5[8];?></td>
  <td><?php echo $arr_6[8];?></td>
</tr>
<tr>
  <td><?php echo $arr_0[9];?></td>
  <td><?php echo $arr_1[9];?></td>
  <td><?php echo $arr_2[9];?></td>
  <td><?php echo $arr_3[9];?></td>
  <td><?php echo $arr_4[9];?></td>
  <td><?php echo $arr_5[9];?></td>
  <td><?php echo $arr_6[9];?></td>
</tr>
</table>
<br>
<a href="index.php" > "返回" </a>
</center>
</body>
</html>
