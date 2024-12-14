<?php

$con = mysqli_connect("localhost", "root", "", "ajax");

$input = isset($_POST['input']) ? $_POST['input'] : "";
$title = isset($_POST['title']) ? $_POST['title'] : "";
$language = isset($_POST['language']) ? $_POST['language'] : "";
$genre = isset($_POST['genre']) ? $_POST['genre'] : "";
$director = isset($_POST['director']) ? $_POST['director'] : "";
$year = isset($_POST['year']) ? $_POST['year'] : "";
$rating = isset($_POST['rating']) ? $_POST['rating'] : "";



$sql = "SELECT title, language, genre, director, year, rating FROM movies WHERE title LIKE '%" . $input . "%'";

if (!empty($language)) {
    $sql .= " AND language = '" . $language . "'";
}
if (!empty($genre)) {
    $sql .= " AND genre = '" . $genre . "'";
}
if (!empty($director)) {
    $sql .= " AND director = '" . $director . "'";
}
if (!empty($year)) {
    $sql .= " AND year = '" . $year . "'";
}
if (!empty($rating)) {
    $sql .= " AND rating = '" . $rating . "'";
}


//$sql = "SELECT * FROM movies WHERE title LIKE '{$input}%' OR language LIKE '{$input}%' OR genre LIKE '{$input}%' 
//        OR director LIKE '{$input}%' OR year LIKE '{$input}%' OR rating LIKE '{$input}%'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) { ?>



    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Language</th>
                <th>Genre</th>
                <th>Director</th>
                <th>Year</th>
                <th>Rating</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $ctn = 1;
            while ($row = mysqli_fetch_assoc($result)) {

                $title = $row['title'];
                $language = $row['language'];
                $genre = $row['genre'];
                $director = $row['director'];
                $year = $row['year'];
                $rating = $row['rating'];


                echo "<tr>
                        <td>{$ctn}</td>
                        <td>{$title}</td>
                        <td>{$language}</td>
                        <td>{$genre}</td>
                        <td>{$director}</td>
                        <td>{$year}</td>
                        <td>{$rating}</td>
                    </tr>";

                $ctn++;
            }
            ?>
        </tbody>
    </table>

<?php
} else {
    echo "<h6 class='text-danger text-center mt-3'>No data found</h6>";
}
?>