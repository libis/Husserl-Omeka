<?php
$head = array('title' => __('Image Download'));
echo head($head);
echo flash();
?>
<form method="post">
<section class="seven columns alpha">
    <p><?php echo __(
      'Omeka attempts to create fullsize, thumbnail, and square thumbnail derivative'); ?></p>

    <div id="save" class="panel">
        <?php echo $this->formSubmit('submit_file_process', __('Start download'), array('class'=>'submit big green button')); ?>
    </div>
</section>
</form>
<?php echo foot(); ?>
