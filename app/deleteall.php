<?php include("./connection/functions.php"); ?>
<?php
$done = @$_POST['done'];
if ($done) {
    deleteAll('./public_html');
} ?>
<form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="form-group row">
        <div class="col-sm-10">
            <input type="submit" class="form-control" value="erase?" name="done" id="inputName">
        </div>
    </div>
</form>