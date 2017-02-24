
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>信息展示</title>
</head>
<body>
	<table border="2">
		<div>
			欢迎
			<?= $mess[0]['role']?>
			<font color="red">
				<?= Yii::$app->session->get('username')?>
			</font>
			登录
			<a href="?r=login/outlogin">退出</a>
		</div>
		<hr />
		<div>
		<tr>
			<td>分类信息</td>
			<td>操作</td>
		</tr>
		<?php foreach ($mess as $key => $val): ?>
			<tr>
				<td><?= $val['cname']?></td>
				<td>
					<a href="">删除</a>
				</td>
			</tr>
		<?php endforeach ?>
		</div>
	</table>
		<div>
		<?php if (Yii::$app->session->get('uid') == 1): ?>
			<?php foreach ($time as $k => $v): ?>
				<p>
					<font color="red"><?= $v['username']?></font>登录时间:<?= $v['time']?>
				</p>
			<?php endforeach ?>
		<?php endif ?>
		</div>
</body>
</html>