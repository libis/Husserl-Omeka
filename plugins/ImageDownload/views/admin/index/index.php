<?php
$head = array('title' => __('Image Download'));
echo head($head);
echo flash();
?>
<form method="post">
<section class="seven columns alpha">
    <p>Omeka will download files referenced in the metadata field ('Is Referenced By'). This might take a while, but the process runs in the background so you can continue using the website.</p>

    <div id="save" class="panel">
        <?php echo $this->formSubmit('submit_file_process', __('Start download'), array('class'=>'submit big green button')); ?>
    </div>
</section>
</form>
<?php echo foot(); ?>
