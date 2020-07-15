<?php
	include "header.php";
	if(isset($_SESSION['login']) && $_SESSION['login'] === 1){
		if(isset($_GET['id'])){
			$class_id = intval($_GET['id']);
			$sql = "SELECT * FROM `classes` where id={$class_id}";
			$result = $conn->query($sql);
			if($result){
				$row = $result->fetch_object();
				$list = 0;
			}else{
				die("<script>alert('Something wrong happend!');location.href='user.php';</script>");
			}
		}else{
			$sql = "SELECT * FROM `classes`";
			$result = $conn->query($sql);
			while ($row = $result->fetch_object()){
        		$classes_arr[] = $row;
        		file_put_contents("1.txt", $row->title . $row->content);
    		}
			$list = 1;
		}
		$result->free();
		$conn->close();
	}else{
		die("<script>alert('You should log in!');location.href='user.php';</script>");
	}

?>
<?php
	if ($list) {
		print "
							<table class=\"table\">
								<thead>
									<tr>
										<th>
											课程编码
										</th>
										<th>
											标题
										</th>
									</tr>
								</thead>
								<tbody>
				";
				for ($i=0; $i < count($classes_arr); $i++) { 
					print "
									<tr>
										<td>
											{$classes_arr[$i]->id}
										</td>
										<td>
											<a href=\"classes.php?id={$classes_arr[$i]->id}\">{$classes_arr[$i]->title}
										</td>
									</tr>
						   ";
				}
				print "
								</tbody>
							</table>
						</div>
					</div>
				</div>
				       ";
	}else{
		print "
		<div class=\"container\">
			<div class=\"row clearfix\">
				<div class=\"col-md-12 column\">
					<h2>
						{$row->title}
					</h2>
					<p>
						{$row->content}
					</p>
				</div>
			</div>
		</div>";
	}
?>
					
<?php
	include "footer.php";
?>