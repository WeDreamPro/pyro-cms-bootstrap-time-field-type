<div class="input-append bootstrap-timepicker">
    <input name="<?php echo $nameform ?>" type="text" class="timepicker" readonly="readonly" value="<?php echo $value ?>">
    <span class="add-on"><i class="icon-time"></i></span>
</div>
<script>
    $(function(){
        $('[name="<?php echo $nameform ?>"]').timepicker();
    })
</script>
<?php if(!empty($value)): ?>
<script>
    $(function(){
        $('[name="<?php echo $nameform ?>"]').timepicker('setTime', '<?php echo $value ?>');
    })
</script>
<?php endif; ?>
