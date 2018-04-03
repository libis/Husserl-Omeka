<?php
$position = isset($options['file-position'])
    ? html_escape($options['file-position'])
    : 'left';
$size = isset($options['file-size'])
    ? html_escape($options['file-size'])
    : 'fullsize';
$captionPosition = isset($options['captions-position'])
    ? html_escape($options['captions-position'])
    : 'center';
?>
<div class="captions-<?php echo $captionPosition; ?>">
<div class="row ">
<?php if($position == "left"):?>
  <div class="col-12 col-md-5 lightgallery">
        <?php foreach ($attachments as $attachment): ?>
            <?php echo $this->exhibitAttachment($attachment, array('imageSize' => $size)); ?>
        <?php endforeach; ?>
  </div>
  <div class="col-12 col-md-7">
    <div class="text">
      <?php echo $text; ?>
    </div>
  </div>
<?php else: ?>
  <div class="col-12 col-md-7">
    <div class="text">
      <?php echo $text; ?>
    </div>
  </div>
  <div class="col-12 col-md-5 lightgallery">
        <?php foreach ($attachments as $attachment): ?>
            <?php echo $this->exhibitAttachment($attachment, array('imageSize' => $size)); ?>
        <?php endforeach; ?>
  </div>
<?php endif;?>
</div>
</div>
