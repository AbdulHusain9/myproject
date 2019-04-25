<?php
	function fetch()
	{
		$output = '';
		$conn = mysqli_connect("localhost","root","","register");
		$sql = "SELECT * FROM studentinfo ORDER BY `#` ASC";
		$result = mysqli_query($conn,$sql);
		while ($row = mysqli_fetch_array($result)) {
			$output .= '<tr>
								<td>'.$row["#"].'</td>
								<td>'.$row["fname"].'</td>
								<td>'.$row["mname"].'</td>
								<td>'.$row["lname"].'</td>
								<td>'.$row["gender"].'</td>
								<td>'.$row["country"].'</td>
								<td>'.$row["contact"].'</td>
								<td>'.$row["sem"].'</td>
								<td>'.$row["coursename"].'</td>
								<td>'.$row["collagename"].'</td>
								<td>'.$row["admissionyear"].'</td>
								<td>'.$row["doj"].'</td>
			';
		}
		return $output;

	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Report</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>
<body>
	<br />
           <div class="container">  
                <h4 align="center"> The Student Report List Of All The Students</h4><br /> 
                <button onclick="myFunction()" style="float: right;">Print</button>
                
                <button onclick="backfunction()">Back To The Main Page</button>
                <div class="table-responsive">  
                	
                     <br/>
                     <br/>
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="5%">#</th>  
                               <th width="5%">FirstName</th>  
                               <th width="5%">MiddleName</th>  
                               <th width="5%">LastName</th> 
                               <th width="5%">Gender</th>
                               <th width="10%">Country</th>
                               <th width="10%">Contact</th>
                               <th width="5%">CourseName</th>
                               <th width="5%">Semester</th>
                               <th width="10%">CollageName</th>
                               <th width="10%">AdmissionYear</th>
                               <th width="20%">DateOfJoin</th>
                              
                                
                          </tr>  
                     <?php  
                     	echo fetch();  
                     ?> 
                     <script>
						function myFunction() {
  						window.print();
						}
						function backfunction(){
							window.history.back();
						}
					</script> 
                     </table>  
                </div>  
           </div>  
</body>
</html>