<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:92:"/usr/local/var/www/dsmall/public/../application/admin/view/statindustry/stat_linelabels.html";i:1574757822;}*/ ?>
<div id="container_<?php echo $stattype; ?>"></div>
<script src="<?php echo PLUGINS_SITE_ROOT; ?>/highcharts/highcharts.js"></script>
<script>
$(function () {
    $('#container_<?php echo $stattype; ?>').highcharts(<?php echo $stat_json; ?>);
});
</script>