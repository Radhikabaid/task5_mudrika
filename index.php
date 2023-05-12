<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "mudrika";

$con = mysqli_connect($serverName, $userName, $password, $dbName);

if(mysqli_connect_errno()){
    echo "Failed to connect!";
    exit();
}

$sql = "SELECT Image FROM descp";
$result = mysqli_query($con, $sql);
$num_rows = mysqli_num_rows($result);
$num_rows -= 1;

if (mysqli_num_rows($result) > 0) {
    $images = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $images[] = $row['Image'];
    }
} else {
    echo "No images found in the database.";
}

?>
<!DOCTYPE html>
<html lang="'en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="custom.css">
</head>

<body>
    <main>
    <?php
        
        foreach ($images as $image) {
            echo '<img src="' . $image . '" alt="" class="slide">';
        }
        ?>
    </main>
    <div class="nav">
        <button onclick="goPrev()">
            Prev
        </button>
        <button onclick="goNext()">
            Next
        </button>

    </div>
    <script>
        const slides = document.querySelectorAll(".slide")
    var inc = 0;
    var num ="<?php echo $num_rows; ?>";

    slides.forEach(
        (slide, index) => {
            slide.style.left = `${index * 100}%`
        }
    )


    const goPrev = () =>{
        if(inc==0)
        {
            inc=num
        }
        else{
            inc--
        }
        slideImage()
    }

    const goNext = () =>{
        if(inc==num)
        {
            inc=0
        }
        else{
            inc++
        }
        slideImage()
    }
    const slideImage = () => {
        slides.forEach(
            (slide) => {
                slide.style.transform = `translateX(-${counter * 100}%)`
            }
        )
    }
    </script>
</body>
</html>