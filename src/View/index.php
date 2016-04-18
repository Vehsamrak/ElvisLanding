<?php
/** @var \Entity\News[] $news */
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
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
        <table>

            <?php if (empty($news)) { ?>
                <div class="break-30"></div>
                There are no news yet
                <div class="break-30"></div>
            <?php } ?>

            <?php foreach ($news as $newsEntry) { ?>
                <tr class="news">
                    <td>

                        <div class="news-info-block">
                            <div class="news-author">
                                <strong>
                                    <?= $newsEntry->getDate() ?>
                                </strong>
                                <br>
                                <?= $newsEntry->getAuthorName() ?>
                            </div>
                        </div>
                    </td>
                    <td>

                        <div class="news-text">
                            <div class="news-title">
                                <?= $newsEntry->getTitle() ?>
                            </div>
                            <?= $newsEntry->getText() ?>
                        </div>
                    </td>
                </tr>

            <?php } ?>
        </table>
        <span class="newsbox-bottom">
            <a href="/">News archive</a>
            | <a href="/news/add">Publish news post</a>
            | <a href="/admin">Administration page</a>
        </span>
    </div>
</div>
