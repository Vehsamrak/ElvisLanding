<html>
<head>
    <link rel="stylesheet" href="css/styles.css">
</head>
</html>

<div class="center">
    <h1>Elvis</h1>

    <div class="feature">first image</div>
    <div class="feature">second image</div>
    <div class="feature">third image</div>

    <div class="break-30"></div>

    <div class="newsbox">
        <span class="newsbox-title">Latest News</span>
        <?php
        /** @var \Entity\News[] $news */
        foreach ($news as $newsEntry) {
            ?>
            <div class="news"><?= $newsEntry->getText() ?></div>
            <?php
        }
        ?>
    </div>
</div>
