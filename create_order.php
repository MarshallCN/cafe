<?php
$sql_fcata = "select catalog_id,cata_name from food_catalogue where food_id = catalog_id;";
		$result_fcata = $mysql->query($sql_fcata);
		echo "<form action='create.php' method ='post'>";
		echo "<a href=#Sandwiches>Sandwiches</a> ";
		echo "<a href=#Salads>Salads</a>  ";
		echo "<a href=#Eggs>Eggs</a>  ";
		echo "<a href=#BREAKFAST>Breakfast</a>  ";
		echo "<a href=#Patisserie>Patisserie</a>  ";
		echo "<div id='cusid' class='bold'>Customer ID: <input type='text' name='cus_id' maxlength='6' placeholder='Less than 6 numbers'/></div>";
		echo "<table class ='table-stripped'>"; 
		while($row_fcata = $mysql->fetch($result_fcata)) {
			$cata_id = $row_fcata['catalog_id']; 
	        $sql_finfo = "select s.food_id,s.cata_name as food_name,s.price,s.catalog_id from food_catalogue as s join food_catalogue as p where p.food_id = s.catalog_id and s.price IS NOT NULL and s.catalog_id = ".$cata_id.";"; 
	        $result_finfo = $mysql->query($sql_finfo); 
            echo "<th colspan='5' id=".$row_fcata['cata_name'].">".$row_fcata['cata_name']."</th>";
            echo "<tr><td class='bold'>Food ID</td><td class='bold'>Food Name</td><td class='bold'>Food Price</td><td class='bold'>Quantity</td></tr>";
            while($row_finfo = $mysql->fetch($result_finfo)) {
                echo "<tr>";
                echo "<td>".$row_finfo['food_id']."</td>";
                echo "<td>".$row_finfo['food_name']." </td>";
			    echo "<td>&#165;".$row_finfo['price']." </td>";
			    echo "<td><input type='number' name='".$row_finfo['food_id']."' min = '0' max = '999'/></td>" ;
	            echo "</tr>";
            }
		}
		echo "</table><br/><blocks cols='2'><div><button type='reset' outline>Reset</button></div>";
		echo "<div class='text-right'><button type='primary' name='create'>Create</button></div></form></blocks>";	
?>