<?php
include 'header.html';
session_start();

if (! empty($_POST)) {
    
    $dbhost = 'localhost:3306/';
    $dbuser = 'root';
    $dbpass = 'root';
    $database = 'onlineorder';
    
    $category_name = $_POST['category_name'];
    
    $dbConnection = mysqli_connect($dbhost, $dbuser, $dbpass, $database);
    
    if (! $dbConnection) {
        echo 'could not connect ' . mysql_error();
    } else {
        $sql_1 = "select category_name from categories";
        $result_1 = mysqli_query($dbConnection, $sql_1);
        if (! $result_1) {
            echo '<script type="text/javascript">
                        alert("There was some erorrs during creation!");
                        </script>';
        }
        $num_rows = mysqli_num_rows($result_1);
        
        if ($num_rows >= 0) {
            $i = 0;
            while ($num_rows > $i) {
                $array = mysqli_fetch_array($result_1);
                $categorey = $array['category_name'];
               
                if ($category_name == $categorey || empty($category_name)) {
                    
                    echo '<script type="text/javascript">
                        alert("This Category you are trying to make is already created or you are passing empty!");
                        </script>';
                    
                    mysqli_close($dbConnection);
                    return;
                }
                $i ++;
            }
            
        } 
        
       
            
            $sql_2 = "insert into categories (category_name) values('$category_name')";
            $result_2 = mysqli_query($dbConnection, $sql_2);
            mysqli_close($dbConnection);
            if (! $result_2) {
                echo mysqli_error($dbConnection);
                
            } else {
                echo '<script type="text/javascript">
                        alert("The Category ' . $category_name . ' has been created now!");
                        </script>';
               
                return;
            }
       
    }
}
?>
<div class="container">
	<h1>Creat New Catagorey</h1>
	<form class="form-horizontal" role="form" action="categorey.php"
		method="post">
		<div class="from-group">

			<label for="category_name">Categorey Name</label> <input type="text"
				class="form-control" name="category_name">
		</div>
		<div class="from-group">
			<br> <input type="submit" value="Create" class="btn btn-default"
				name="">
		</div>
	</form>
</div>
<?php
include 'footer.html';
?>