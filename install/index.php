<?php
/**
 * Installer
 *
 * @authors Copy112 <copy112@gmail.com> & Joff <spud2k_2000@msn.com>
 * @copyright Copy112 & Joff 2009
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GPLv3
 * @package Installer for MG (modulargaming)
 * @version 2.0
 **/
 
include "template/header.php"; 
?>

<html>
<head>
</head>
<body>
This will install Modular Gaming in the current directory, Are you sure you want to carry on?
<br />
<a href="javascript:void showWindow();">Install</a>
<script>
function showWindow()
{
  win = new Window( { className: 'mgcube', url: 'install.php',
    title: 'Modular Gaming Install', destroyOnClose: true, recenterAuto:false, minimizable:true, maximizable:true } ); 
  win.maximize();
  win.showCenter();
}
</script>
</body>
</html>
<?php
include "template/footer.php"; 
?>