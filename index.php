<?php

// Include the database configuration file
include 'reusable/connect.php';
// Include the header file
include 'reusable/header.php';

// Query to select all channels
$query = "SELECT Channel.*, Category.name as category_name
          FROM Channel 
          JOIN Category ON Channel.category_id = Category.id";

// Execute the query
$result = $conn->query($query);


?>


<body>
<div class="container mt-5">
    <h2>Tech Channel List</h2>
    <hr>

    <?php
    // Check if there are results
    if ($result->num_rows > 0) {
      // Output data of each row
      while ($row = $result->fetch_assoc()) {
        echo "<div class='card my-3'>";
        echo "<div class='card-body'>";
        echo "<h2 class='card-title'>Channel Name: " . $row["name"] . "</h2>";
        echo "<p class='card-text'>Description: " . $row["description"] . "</p>";
        echo "<p class='card-text'>YouTube URL: <a href='" . $row["youtube_url"] . "' target='_blank'>" . $row["youtube_url"] . "</a></p>";
        echo "<p class='card-text'>Category: " . $row["category_name"] . "</p>";
        echo "<a href='edit_channel.php?id=" . $row["id"] . "' class='btn btn-primary'>Edit</a>";
        echo "</div>";
        echo "</div>";
      }
    } else {
      echo "<p>No channels found</p>";
    }
    ?>

</div>


</body>
</html>

<?php
// Close the connection
$conn->close();
?>


