<?php 
    $servername = "localhost";
$username = "root";
$password = "";
$database_in_use = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $database_in_use);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo " ";


?>

<html>
<head>
    <title>VEHICLE COUNTING SYSTEM DATA</title>
    <style type="text/css">
        .vcs_table, .table_cells_odd, .table_cells_even {
                padding-right: 20px;
                padding-left: 20px;
                color: #000;
        }
        .vcs_table {
            color: #FFF;
            background-color: #666;
        }
        .table_cells_odd {
            background-color: #CCC;
        }
        .table_cells_even {
            background-color: #FAFAFA;
        }
        table {
            border: 2px solid #333;
        }
        body { font-family: "Trebuchet MS", Arial; }
    </style>
</head>

    <body>
        <h1>VEHICLE COUNTING SYSTEM DATA</h1>


    <table border="0" cellspacing="0" cellpadding="4">
      <tr>
			<td class="vcs_table">Day</td>
            <td class="vcs_table">Motor_Tricycle</td>
            <td class="vcs_table">Passenger_Car</td>
            <td class="vcs_table">Passenger_Utility</td>
			<td class="vcs_table">Goods_Utility</td>
            <td class="vcs_table">Bus</td>
            <td class="vcs_table">Trucks</td>
          </tr>	
<?php


    $sql = "SELECT Day, Motor_Tricycle, Passenger_Car, Passenger_Utility, Goods_Utility, Bus, Trucks FROM vcs_table";
$result = $conn->query($sql);

// Used for row color toggle
    $oddrow = true;
	
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        {
        if ($oddrow) 
        { 
            $css_class=' class="table_cells_odd"'; 
        }
        else
        { 
            $css_class=' class="table_cells_even"'; 
        }

        $oddrow = !$oddrow;

        echo '<tr>';
		echo '   <td'.$css_class.'>'.$row["Day"].'</td>';
        echo '   <td'.$css_class.'>'.$row["Motor_Tricycle"].'</td>';
        echo '   <td'.$css_class.'>'.$row["Passenger_Car"].'</td>';
        echo '   <td'.$css_class.'>'.$row["Passenger_Utility"].'</td>';
		echo '   <td'.$css_class.'>'.$row["Goods_Utility"].'</td>';
        echo '   <td'.$css_class.'>'.$row["Bus"].'</td>';
        echo '   <td'.$css_class.'>'.$row["Trucks"].'</td>';
        echo '</tr>';
    }
    }
} else {
    echo "0 results";
}
$conn->close();
    
?>
    </table>
    </body>
</html>