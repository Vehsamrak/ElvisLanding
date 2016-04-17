<?php
/** @var \Entity\News[] $news */
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
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
        <?php foreach ($news as $newsEntry) { ?>

            <div class="news">
                <div class="news-info-block">
                    <div class="news-author">
                        <?= $newsEntry->getDate() ?>
                    </div>
                </div>
                <div class="news-text">
                    <div class="news-title">
                        <?= $newsEntry->getTitle() ?>
                    </div>
                    <?= $newsEntry->getText() ?>
                </div>
            </div>

        <?php } ?>
        <span class="newsbox-bottom"></span>
    </div>
</div>
