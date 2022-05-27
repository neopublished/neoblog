<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "components/module-head.php";
    require "../utils.php";
    ?>

    <?php $pagename = basename(__FILE__); ?>
</head>

<body>
    <?php include "components/login-window.php"; ?>

    <?php if ($_SESSION['login'] === true) { ?>
        <?php include "components/sidebar.php"; ?>

        <div class="w3-main module-content">

            <?php include "components/module-header.php" ?>

            <button class="w3-right" onclick="window.location = 'newpost.php'">Compose new post</button>

            <!-- Popup for success messages -->
            <?php
            if (isset($_GET['success-deleted'])) {
                echo '<p class="w3-container w3-left w3-text-green"> <b><i class="fa fa-check"></i> Post successfully deleted</b></p>';
            } elseif (isset($_GET['success-post'])) {
                echo '<p class="w3-container w3-left w3-text-green"> <b><i class="fa fa-check"></i> Post successfully published</b></p>';
            } elseif (isset($_GET['success-update'])) {
                echo '<p class="w3-container w3-left w3-text-green"> <b><i class="fa fa-check"></i> Post successfully updated</b></p>';
            }
            ?>

            <hr>

            <div class="w3-container">

                <ul>
                    <?php
                    $file = "../content/$current_year.json";

                    $posts_exist = false;

                    if (file_exists($file) && filesize($file) > 0) {

                        $handle = fopen($file, "a+");
                        $contents = fread($handle, filesize($file));
                        $posts = json_decode($contents);
                        fclose($handle);

                        foreach ($posts as $post) {
                            $posts_exist = true;

                    ?>
                            <li>
                                <a class="w3-left" href="<?php echo $post->uri; ?>">
                                    <?php echo $post->date; ?>
                                </a>
                            </li>
                    <?php
                        }
                    }
                    ?>
                </ul>
            </div>

            <!-- Only display last <hr> if there are posts.
                Othersise it would look weird -->
            <?php if ($posts_exist === true) {
            ?>
                <hr><?php
                } ?>
        </div>

        <script src="components/sidebar.js"></script>
    <?php } ?>
</body>

</html>