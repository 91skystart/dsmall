<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:93:"/usr/local/var/www/dsmall/public/../application/admin/view/statmarketing/stat_linelabels.html";i:1574757822;}*/ ?>
<div id="container_<?php echo $stattype; ?>"></div>
<script>
$(function () {
    $('#container_<?php echo $stattype; ?>').highcharts(<?php echo $stat_json; ?>);
});
</script>