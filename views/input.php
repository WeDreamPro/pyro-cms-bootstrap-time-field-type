<?php if ($this->uri->segment(1) !== 'admin'): ?>
    <link rel="stylesheet" href="<?= base_url('streams_core/field_asset/css/bootstrap_time/timepicker.min.css'); ?>" />	
    <script type="text/javascript" src="<?= base_url('streams_core/field_asset/js/bootstrap_time/timepicker.js'); ?>"></script>
<?php endif; ?>
<div class="input-append bootstrap-timepicker">
    <input name="<?php echo $nameform ?>" type="text" style="width: 97%; display: inline-block" class="timepicker" readonly="readonly" value="<?php echo $value ?>">
    <span class="add-on"><i class="fa fa-clock-o" style="font-size: 20px"></i></span>
</div>
<script>
    $(function() {
        $('[name="<?php echo $nameform ?>"]').timepicker();
    })
</script>
<?php if (!empty($value)): ?>
    <script>
        $(function() {
            $('[name="<?php echo $nameform ?>"]').timepicker('setTime', '<?php echo $value ?>');
        });
    </script>
<?php endif; ?>
