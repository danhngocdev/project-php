<?php include 'header.php'; ?>
<?php 
$module = isset($_GET['module']) ? $_GET['module'] : 'main';
$action = isset($_GET['action']) ? $_GET['action'] : 'danh-sach';

include 'modules/'.$module.'/'.$action.'.php';
?>
 <?php include 'footer.php'; ?>