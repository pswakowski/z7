<?php  if (count($success) > 0) : ?>
    <div style="margin-top: 10px; padding: .75rem .75rem;" class="alert alert-success">
        <?php foreach ($success as $succes) : ?>
            <p><?php echo $succes ?></p>
        <?php endforeach ?>
    </div>
<?php  endif ?>