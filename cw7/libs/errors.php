<?php  if (count($errors) > 0) : ?>
    <div style="margin-top: 10px; padding: .75rem .75rem;" class="alert alert-danger">
    <?php foreach ($errors as $error) : ?>
            <p><?php echo $error ?></p>
        <?php endforeach ?>
    </div>
<?php  endif ?>