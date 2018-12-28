<?php if(validation_errors()) {?>
    <ul style="color: red;">
        <?php echo validation_errors('<li>','</li>')?>
    </ul>
<?php } ?>

<form method="post" action="<?php echo site_url('captcha')?>">
    <p><?php echo $img?></p>
    <p> Type Code: <input type="text" name="captcha"></p>
    <p><input type="submit" name="submit" value="submit"></p>
</form>