<?php
// include the connect.php file
include 'reusable/connect.php';

// include the header file
include 'reusable/header.php';

$id = $_POST['id'];
$name = $_POST['name'];
$description = $_POST['description'];
$youtube_url = $_POST['youtube_url'];
$category_id = $_POST['category_id'];

// Prepare the update query
$query = "UPDATE Channel SET name = '$name', description = '$description', youtube_url = '$youtube_url', category_id = $category_id WHERE id = $id";
try {
  $result = mysqli_query($conn, $query);
  // Check if the query was successful
  if ($result) {
    echo "Channel updated successfully";
    // redirect
    header('Location: index.php');
  } else {
    echo "Error updating channel: " . mysqli_error($conn);
  }
} catch (Exception $e) {
  echo "An error occurred: " . $e->getMessage();
}




