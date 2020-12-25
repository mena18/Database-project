<?php if(isset($_GET['url'])) {
$url =  explode('/',$_GET['url']);
$result = array_search('error',$url);
if($result){
?>
<script>
error('<?=$url[$result+1]?>');
</script>
<?php }} ?>



<?php if(isset($_GET['url'])) {
$url =  explode('/',$_GET['url']);
$result = array_search('success',$url);
if($result){
?>
<script>
success('<?=$url[$result+1]?>');
</script>
<?php }} ?>
