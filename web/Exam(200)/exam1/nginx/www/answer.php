<?php
	include "header.php";
	if (!isset($_SESSION['login'])) {
		die("<script>alert('You need to log in!');location.href='login.php';</script>");
	}
	if (isset($_POST) && !empty($_POST)) {
		
		$username = $_SESSION['username'];
		$grades = rand(1, 43);
		$sql = "UPDATE `users` SET grades='{$grades}' where username = '{$username}'";
		$result = $conn->query($sql);
		if ($result !== False) {
			$conn->close();
			print "<script>alert('Your grades is {$grades}');</script>";
		}else{
			$conn->close();
			print "<script>alert('Your grades is 0');</script>";
		}
	}
?>
					<div class="jumbotron">
						<form role="form" action="answer.php" method="post" name="physics">
							<p>1. C1 和C2 两空气电容器，把它们串联成一电容器组．若在C1 中插入一电介质板，则</p>
							<input type="radio" name="1.a" >C1的电容增大，电容器组总电容减小.
							<input type="radio" name="1.b" >C1的电容增大，电容器组总电容增大.
							<input type="radio" name="1.c" >C1的电容减小，电容器组总电容减小.
							<input type="radio" name="1.d" >C1的电容减小，电容器组总电容增大.<br><br>

							<p>2. C1 和C2 两空气电容器，把它们串联成一电容器组．若在C1 中插入一电介质板，则
C1的电容增大，电容器组总电容减小 C1的电容增大，电容器组总电容增大． C1的电容减小，电容器组总电容减小． C1的电容减小，电容器组总电容增大．</p>
							<input type="radio" name="2.a" >U1
							<input type="radio" name="2.b" >U2
							<input type="radio" name="2.c" >U1+U2
							<input type="radio" name="2.d" >(U1+U2)/ 2<br><br>

							<p>3. 真空中均匀带电的球面和球体，如果两者的半径和总电荷都相等，则带电球 面的电场能量W1 与带电球体的电场能量W2 相比，W1________ W2</p>
							<input type="radio" name="3.a" >大于
							<input type="radio" name="3.b" >小于
							<input type="radio" name="3.c" >等于
							<input type="radio" name="3.d" >不能确定<br><br>

							<p>4. 电流I 由长直导线1 沿平行bc 边方向经a 点流入由电阻均匀的导线构成的正三角形线框，再由b 点沿垂直ac 边方向流出，经长直导线2 返回电源．若载流直导线1、2 和三角形框中的电流在框中心O 点产生的磁感强度分别用B1、B2和B3表示（注：B1、B2和B3为矢量），则O 点的磁感强度大小</p>
							<input type="radio" name="4.a" >B = 0，因为 B1 = B2 = B3 = 0
							<input type="radio" name="4.b" >B = 0，因为虽然 B1≠ 0、B2≠ 0，但B1+B2=0，B3 = 0．
							<input type="radio" name="4.c" >B ≠ 0，因为虽然 B2 = 0、B3= 0，但 B1≠ 0．
							<input type="radio" name="4.d" >B ≠ 0，因为虽然B1+B2≠0，但B3≠0<br><br>

							<p>5.一载有电流 I 的细导线分别均匀密绕在半径为 R 和 r 的长直圆筒上形成两个螺线管，两螺线管单位长度上的匝数相等．设 R = 2r，则两螺线管中的磁感强度大小 B(R)和 B(r)应满足：</p>
							<input type="radio" name="5.a" >B(R) = 2 B(r)
							<input type="radio" name="5.b" >B(R) = B(r)
							<input type="radio" name="5.c" >2 B(R) = B(r)
							<input type="radio" name="5.d" >B(R) = 4 B(r)<br><br>

							<p>6. 在光栅光谱中，假如所有偶数级次的主极大都恰好在单缝衍射的暗纹方向上， 因而实际上不出现，那么此光栅每个透光缝宽度 a 和相邻两缝间不透光部分宽度 b 的关系为</p>
							<input type="radio" name="6.a" >a=0.5b
							<input type="radio" name="6.b" >a=b
							<input type="radio" name="6.c" >a=2b
							<input type="radio" name="6.d" >a=3b<br><br>

							<p>7. 两偏振片堆叠在一起，一束自然光垂直入射其上时没有光线通过。当其中一 偏振片慢慢转动 180°时透射光强度发生的变化为</p>
							<input type="radio" name="7.a" >光强单调增加．
							<input type="radio" name="7.b" >光强先增加，后又减小至零．
							<input type="radio" name="7.c" >光强先增加，后减小，再增加．
							<input type="radio" name="7.d" >光强先增加，然后减小，再增加，再减小至零．<br><br>

							<p>8. 如果两种不同质量的粒子，其德布罗意波长相同，则这两种粒子的</p>
							<input type="radio" name="8.a" >动量相同
							<input type="radio" name="8.b" >能量相同
							<input type="radio" name="8.c" >速度相同
							<input type="radio" name="8.d" >动能相同<br><br>

							<p>9. 由氢原子理论知，当大量氢原子处于 n =3 的激发态时，原子跃迁将发出：</p>
							<input type="radio" name="9.a" >一种波长的光
							<input type="radio" name="9.b" >两种波长的光
							<input type="radio" name="9.c" >三种波长的光
							<input type="radio" name="9.d" >连续光谱<br><br>

							<p>10. 子峰Dalao帅吗</p>
							<input type="radio" name="10.a" >帅
							<input type="radio" name="10.b" >帅
							<input type="radio" name="10.c" >帅
							<input type="radio" name="10.d" >帅<br><br>
							<button type="submit" class="btn btn-default">Submit</button>
						</form>
						
					</div>
<?php
	include "footer.php";
?>