<?php
$con = mysqli_connect("localhost", "root", "", "ajax");


$moviesLanguage  = '<select id="selLanguage" ><option value="">Select language</option>';

$sql = "SELECT DISTINCT(language) FROM movies ORDER BY language";

$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $moviesLanguage .= '<option value="' . strtoupper($row['language']) . '">' . strtoupper($row['language']) . '</option>';
    }
    $moviesLanguage .= '</select>';
}



$moviesGenre = '<select id="selGenre"><option value="">Selete genre</option>';
$sql = "SELECT DISTINCT(genre) FROM movies ORDER BY genre";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $moviesGenre .= '<option value="' . strtoupper($row['genre']) . '">' . strtoupper($row['genre']) . '</option>';
    }
    $moviesGenre .= '</select>';
}


$moviesDirector = '<select id="selDirector"><option value="">Selete director</option>';
$sql = "SELECT DISTINCT(director)  FROM movies ORDER BY director";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $moviesDirector .= '<option value="' . strtoupper($row['director']) . '">' . strtoupper($row['director']) . '</option>';
    }
    $moviesDirector .= '</select>';
}

$moviesYear = '<select id="selYear"><option value="">Selete year</option>';
$sql = "SELECT DISTINCT(year) FROM movies ORDER BY year";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $moviesYear .= '<option value="' . strtoupper($row['year']) . '">' . strtoupper($row['year']) . '</option>';
    }
    $moviesYear .= '</select>';
}


$moviesRating = '<select id="moviesRating"><option value="">Selete year</option>';
$sql = "SELECT DISTINCT(rating)  FROM movies ORDER BY rating";

$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $moviesRating .= '<option value="' . strtoupper($row['rating']) . '">' . strtoupper($row['rating']) . '</option>';
    }
    $moviesRating .= '</select>';
}




// $moviesLanguage  = '<select id="selLanguage" ><option value="">Select language</option>';
// $moviesGenre = '<select id="selGenre"><option value="">Selete genre</option>';
// $moviesDirector = '<select id="selDirector"><option value="">Select director </option>';
// $moviesYear = '<select id="selYear"><option value="">Select year </option>';
// $moviesRating = '<select id="selRating"><option value="">Select rating </option>';

// //$sql = "SELECT DISTINCT * FROM movies ORDER BY language, genre, director, year, rating";

//$sql = "SELECT * FROM movies ORDER BY language,genre,director,'year',rating";
// //$sql = "select DISTINCT language,genre,director,year,rating from movies";
// //$sql = "SELECT DISTINCT language, genre, director, year, rating FROM movies ORDER BY language, genre, director, year, rating";

// $result = mysqli_query($con, $sql);
// if (mysqli_num_rows($result) > 0) {
//     while ($row = mysqli_fetch_assoc($result)) {
//         $moviesLanguage .= '<option value="' . strtoupper($row['language']) . '">' . strtoupper($row['language']) . '</option>';
//         $moviesGenre .= '<option value="' . strtoupper($row['genre']) . '">' . strtoupper($row['genre']) . '</option>';
//         $moviesDirector .= '<option value="' . strtoupper($row['director']) . '">' . strtoupper($row['director']) . '</option>';
//         $moviesYear .= '<option value="' . strtoupper($row['year']) . '">' . strtoupper($row['year']) . '</option>';
//         $moviesRating .= '<option value="' . strtoupper($row['rating']) . '">' . strtoupper($row['rating']) . '</option>';
//     }
// }
// $moviesLanguage .= '</select>';
// $moviesGenre .= '</select>';
// $moviesDirector .= '</select>';
// $moviesYear .= '</select>';
// $moviesRating .= '</select>';



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Search Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h2>Search Movie</h2>
        <form id="frm_movie">


            <div class="form-check form-check-inline">
                <input name="categories[]" class="form-check-input" type="checkbox" value="language" id="language">
                <label class="form-check-label" for="language">Language</label>
            </div>
            <div class="form-check form-check-inline">
                <input name="categories[]" class="form-check-input" type="checkbox" value="genre" id="genre">
                <label class="form-check-label" for="genre">Genre</label>
            </div>
            <div class="form-check form-check-inline">
                <input name="categories[]" class="form-check-input" type="checkbox" value="director" id="director">
                <label class="form-check-label" for="director">Director</label>
            </div>
            <div class="form-check form-check-inline">
                <input name="categories[]" class="form-check-input" type="checkbox" value="year" id="year">
                <label class="form-check-label" for="year">Year</label>
            </div>
            <div class="form-check form-check-inline">
                <input name="categories[]" class="form-check-input" type="checkbox" value="rating" id="rating">
                <label class="form-check-label" for="rating">Rating</label>
            </div>
            <div id="languageDropDown" class="input-group mt-3 w-25 d-none">
                <?php
                echo $moviesLanguage;
                ?>
            </div>
            <div id="genreDropDown" class="input-group mt-3 w-25 d-none">
                <?php
                echo  $moviesGenre;
                ?>
            </div>
            <div id="directorDropdown" class="input-group mt-3 w-25 d-none">
                <?php
                echo $moviesDirector;
                ?>
            </div>
            <div id="yearDropDown" class="input-group mt-3 w-25 d-none">
                <?php
                echo $moviesYear;
                ?>
            </div>
            <div id="ratingDropdown" class="input-group mt-3 w-25 d-none">
                <?php
                echo $moviesRating;
                ?>
            </div>



            <div class="input-group mt-3 w-25">
                <input type="text" id="search_movie_textbox" class="form-control" placeholder="Search" aria-label="Search" />
                <button type="button" class="btn btn-primary">
                    <i class="fas fa-search"></i>
                </button>
            </div>

            <div id="response"></div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $("#search_movie_textbox").keyup(function() {
                var input = $(this).val();
                var title = $("#title").val();
                var language = $("#selLanguage").val();
                var genre = $("#selGenre").val();
                var director = $("#selDirector").val();
                var year = $("#selYear").val();
                var rating = $("#selRating").val()

                if (input != "") {
                    $.ajax({
                        type: "POST",
                        url: "try_insert.php",
                        data: {
                            input: input,
                            title: title,
                            language: language,
                            genre: genre,
                            director: director,
                            year: year,
                            rating: rating


                        },
                        success: function(data) {
                            $("#response").html(data);
                        }
                    });
                } else {
                    $("#response").html("");
                }
            });
            $("#language").click(function() {
                $("#languageDropDown").removeClass('d-none');
            });
            $("#genre").click(function() {
                $("#genreDropDown").removeClass('d-none');
            });
            $("#director").click(function() {
                $("#directorDropdown").removeClass('d-none');
            });
            $("#year").click(function() {
                $("#yearDropDown").removeClass('d-none');
            });
            $("#rating").click(function() {
                $("#ratingDropdown").removeClass('d-none');
                //  $("#genreDropDown").addClass('color-1');
            });
        });
    </script>
</body>

</html>