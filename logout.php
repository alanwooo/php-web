<?php
if (!isset($_SESSION)) {
	session_start();
}
?>
<?php
//$_SESSION['MM_Username']="";
//$_SESSION['MM_UserID']="";
session_destroy();
unset($_SESSION);
echo '<script type="text/javascript">window.alert("谢谢使用，已正常退出！");location.href="index.php";</script>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/licaishionline2.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>牡丹宝官网</title>
</head>
</html>