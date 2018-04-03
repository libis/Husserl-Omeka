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
<?php if($position == "center"):?>
<div class="row">
  <div class="col-12 offset-md-1 col-md-10">
    <div class="exhibit-items <?php echo $position; ?> <?php echo $size; ?> captions-<?php echo $captionPosition; ?>">
        <?php foreach ($attachments as $attachment): ?>
          <div class="exhibit-file-item lightgallery">
            <?php echo $this->exhibitAttachment($attachment, array('imageSize' => $size)); ?>
          </div>
        <?php endforeach; ?>
    </div>
    <?php if(!empty($text)):?>
      <div class="text">
        <?php echo $text; ?>
      </div>
    <?php endif; ?>
  </div>
</div>
<?php endif;?>
<?php if($position == "left"):?>
  <div class="row">
    <div class="col-12 col-md-10">
      <div class="exhibit-items <?php echo $position; ?> <?php echo $size; ?> captions-<?php echo $captionPosition; ?>">
          <?php foreach ($attachments as $attachment): ?>
            <div class="exhibit-file-item lightgallery">
              <?php echo $this->exhibitAttachment($attachment, array('imageSize' => $size)); ?>
            </div>
          <?php endforeach; ?>
      </div>
      <?php if(!empty($text)):?>
        <div class="text">
          <?php echo $text; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
<?php endif;?>
<?php if($position == "right"):?>
  <div class="row">
    <div class="col-12 offset-md-2 col-md-10">
      <div class="exhibit-items <?php echo $position; ?> <?php echo $size; ?> captions-<?php echo $captionPosition; ?>">
          <?php foreach ($attachments as $attachment): ?>
            <div class="exhibit-file-item lightgallery">
              <?php echo $this->exhibitAttachment($attachment, array('imageSize' => $size)); ?>
            </div>
          <?php endforeach; ?>
      </div>
      <?php if(!empty($text)):?>
        <div class="text">
          <?php echo $text; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
<?php endif;?>
