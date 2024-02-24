<?php
// include the connect.php file
include 'reusable/connect.php';

// include the header file
include 'reusable/header.php';

// Assume the channel id is passed through GET method
$channel_id = $_GET['id'];


// Fetch the existing channel data
$query = "SELECT * FROM Channel WHERE id = $channel_id";


// fetch the result 
try {
  $result = mysqli_query($conn, $query);
} catch (Exception $e) {
  echo "Error: " . $e->getMessage();
}

// get only first row of the result
$channel = $result->fetch_assoc();


// Fetch the categories from the category table
$categoryQuery = "SELECT * FROM Category";
try {
  $categoryResult = mysqli_query($conn, $categoryQuery);
} catch (Exception $e) {
  echo "Error: " . $e->getMessage();
}

?>

<body>
  <div class="container">
    <h1> Edit Channel Detail</h1>
    <form action="update_channel.php" method="post">
      <input type="hidden" name="id" value="<?php echo $channel['id']; ?>">

      <div class="mb-3">
        <label for="name" class="form-label">Channel Name:</label>
        <input type="text" id="name" name="name" class="form-control" value="<?php echo $channel['name']; ?>">
      </div>

      <div class="mb-3">
        <label for="description" class="form-label">Description:</label>
        <textarea id="description" name="description"
          class="form-control"><?php echo $channel['description']; ?></textarea>
      </div>

      <div class="mb-3">
        <label for="youtube_url" class="form-label">YouTube URL:</label>
        <input type="text" id="youtube_url" name="youtube_url" class="form-control"
          value="<?php echo $channel['youtube_url']; ?>">
      </div>

      <div class="mb-3">
        <label for="category_id" class="form-label">Category:</label>
        <select id="category_id" name="category_id" class="form-select">
          <?php
          while ($row = mysqli_fetch_assoc($categoryResult)) {
            // if the category id of the current row matches the category id of the channel, add the selected attribute
            $selected = ($row['id'] == $channel['id']) ? 'selected' : '';
            echo "<option value='" . $row['id'] . "' $selected>" . $row['name'] . "</option>";
          }
          ?>
        </select>
      </div>

      <input type="submit" value="Update" class="btn btn-primary">
    </form>
  </div>
</body>

</html>