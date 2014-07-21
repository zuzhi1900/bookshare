<?php
$titles = array('about' => '公告',
              'members' => '用户列表',
              'profile' => '个人资料',
             'settings' => '设置',
      'change-password' => '修改密码',
               'logout' => '退出',
                'login' => '登录',
             'register' => '注册');
foreach ($titles as $key => $value) {
  if (strpos($_SERVER['PHP_SELF'], $key)) {
    echo $value.' | bookshare';
  } else {
    echo "bookshare";
    break;
  }
}
?>