<?php

use yii\web\Session;

$session = Yii::$app->session;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>权限</title>
</head>
<body>
	<h3>后台权限</h3>
	<hr />
	<div>
		<h4>
			欢迎<font color="red"><?= $session->get('username') ?></font>登录
		</h4>
		<hr />
		
			<?php foreach($cname as $val): ?>
						<?php foreach($val as $v): ?>
							<p>
								<b>
									<?= str_repeat('--', 2).$v['cname']?>
								</b>
							</p>
						<?php endforeach;?>
					<?php endforeach;?>		
	</div>
</body>
</html>