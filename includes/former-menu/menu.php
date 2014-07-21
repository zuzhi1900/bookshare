<ul>
	<li><a href="index.php">主页</a></li>
	<?php 

	if($general->logged_in()){?>
		<li><a href="about.php">公告</a></li>
		<li><a href="members.php">用户列表</a></li>
		<li><a href="profile.php?username=<?php echo $user['username'];?>">个人资料</a></li>
		<li><a href="settings.php">设置</a></li>
		<li><a href="change-password.php">修改密码</a></li>
		<li><a href="logout.php">退出</a></li>
	<?php
	}else{?>
		<li><a href="register.php">注册</a></li>
		<li><a href="login.php">登录</a></li>
	<?php
	}
	?>
</ul>
<hr />