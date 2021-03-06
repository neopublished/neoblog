<?php

$file = "quickstart.txt";

if (file_exists($file) && filesize($file) > 0) {
    $handle = fopen($file, "a+");
    $contents = fread($handle, filesize($file));
    fclose($handle);

    // If the file is contents isnt "closed"
    // the user hasn't closed the quickstart guide and
    // the quickstart guide should be rendered
    if ($contents !== "closed") {
?>
        <div>
            <div class="w3-container w3-padding w3-margin w3-light-gray w3-card quickstart">
                <a class="close" onclick="ignore()">&times;</a>

                <h3><b>Quickstart</b></h3>
                <p>Here's some friendly suggestions on what to do next.</p>

                <span class="w3-quarter">
                    <h4>Get started</h4>
                    <button onclick="newPost()" class="w3-button w3-container button-primary">Compose new blogpost</button>
                </span>

                <span class="w3-quarter">
                    <h4>Customize</h4>

                    <ul class="quickstart-list">
                        <li><a href="settings.php">Update site info</a></li>
                        <li><a href="posts.php">Write your first post</a></li>
                        <li><a href="themes.php">Download a theme</a></li>
                    </ul>
                </span>

                <span class="w3-quarter">
                    <h4>Resources</h4>

                    <ul class="quickstart-list">
                        <li><a href="https://github.com/RobinBoers/neoblog">Source</a></li>
                        <li><a href="https://indieweb.org/neoblog">Wiki & Documentation</a></li>
                        <li><a href="https://github.com/RobinBoers/neoblog/issues">Bugtracker</a></li>
                    </ul>
                </span>

            </div>

            <hr>
        </div>
<?php

    }
} else {
    echo "<p class='w3-container'>Something went wrong while loading the quickstart guide...</p>";
    echo "<hr>";
}

?>