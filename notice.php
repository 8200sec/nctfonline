<?php include('includes/header.php'); ?>

<?php
$sOutput .= '<div  class="container col-md-5 col-md-offset-3" ><table class="table ">
   <caption><h2><span class="glyphicon glyphicon-th-list"></span>  Notice <h2></caption>
   
   <tbody>';
   
$query = "select content,times from nctf_notice order by times DESC";

//Run the query
$result = $dbc->query($query);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		    $sOutput .= '<tr><td><h4 style="color: #42dca3">';
		    $arr_content = str_split($row["content"], 40);
			foreach ($arr_content as $value){
				$sOutput .= '<br>'.$value.'<br>';
			}
		    $sOutput .= '<h4></td>';
			$sOutput .= '<td>'.$row["times"].'</td>';
			$sOutput .= '</tr>';
		}
}else {
		echo "There is no notice yet";
		$dbc->close(); 
		
}
$sOutput .= '</tbody></table></div>';   
$sOutput .= '</div>';
echo $sOutput;
?>


<?php include('includes/footer.html'); ?>