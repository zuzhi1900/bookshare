<ul class="nav navbar-nav">
  <?php 
  $pageNames = array('books' => '书籍',
                     'about' => '公告',
  				         'members' => '用户列表',
  				         'profile' => '个人资料',
  				        'settings' => '设置',
  		     'change-password' => '修改密码',
  		   			      'logout' => '退出'
  		   );
  if($general->logged_in()){
    foreach ($pageNames as $key => $value) {
      if ($key == "profile") {?>
      <li class="<?php echo (strpos($_SERVER['PHP_SELF'], $key) ? 'active' : ''); ?>"><a href="<?php echo $key; ?>.php?username=<?php echo $user['username'];?>"><?php echo $value; ?></a></li>
      <?php
      }else if ($key == "books") {?>
      <li class="<?php echo (strpos($_SERVER['PHP_SELF'], $key, 2) ? 'active' : ''); ?>"><a href="<?php echo $key; ?>.php"><?php echo $value; ?></a></li>
      <?php
      } else {?>
      <li class="<?php echo (strpos($_SERVER['PHP_SELF'], $key) ? 'active' : ''); ?>"><a href="<?php echo $key; ?>.php"><?php echo $value; ?></a></li>
      <?php
      }
    }
      ?>
  <?php
  }else {?>
    <li class="<?php echo (strpos($_SERVER['PHP_SELF'], 'register') ? 'active' : ''); ?>"><a href="register.php">注册</a></li>
    <li class="<?php echo (strpos($_SERVER['PHP_SELF'], 'login') ? 'active' : ''); ?>"><a href="login.php">登录</a></li>
  <?php
  }
  ?>
</ul>