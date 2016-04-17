<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add news post</title>
</head>
<body>
<?php if (!empty($errors)) {
    foreach ($errors as $error) { ?>
        <div><?= $error ?></div>
    <?php }
} ?>

<form method="post">
    <input name="author" type="text" placeholder="Author"/>
    <input name="title" type="text" placeholder="Post title"/>
    <input name="date" type="date" title="News date"/>
    <textarea name="text" cols="30" rows="10" title=""></textarea>
    <input type="submit"/>
</form>

</body>
</html>
