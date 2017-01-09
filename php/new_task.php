<?php
  require_once 'config.php';
  require_once 'functions.php';
  $tasker=new Tasker;
  //check for DB connection
  $connect=$tasker->connectDB();
  if ($connect->connect_errno) {
    die("There is no connection to the DB");
  }
  //check for injections
  $username=$tasker->implementFilters($_REQUEST["username"], $connect);
  $email=$tasker->implementFilters($_REQUEST["email"], $connect);
  $task=$tasker->implementFilters($_REQUEST["task"], $connect);
  //load and resize image
  $image = new SimpleImage();
  $image->load($_REQUEST["imageLink"]);
  if ($image->getWidth()>320) {
    $image->resizeToWidth(320);
  }
  if ($image->getHeight()>240) {
    $image->resizeToHeight(240);
  }
  $path="";
  //check for extension
  if ($image->image_type==IMAGETYPE_JPEG) {
    $type="jpg";
  }
  elseif ($image->image_type==IMAGETYPE_GIF) {
    $type="gif";
  }
  elseif ($image->image_type==IMAGETYPE_PNG) {
    $type="png";
  }
  //insert data into the DB
  $lock=$connect->query("LOCK TABLES `urls` WRITE");
  $success=$connect->query("INSERT INTO  `tasks` (`id`, `username`, `email`, `task`, `imagelink`, `status`) VALUES (NULL, '$username', '$email', '$task', '$path', '0')");
  //save image with last query id
  $path="/img/image_".$connect->insert_id.".".$type;
  $image->save("..".$path);
  //save link into the DB
  $success=$connect->query("UPDATE `tasks` SET `imagelink`='$path' WHERE `id`='$connect->insert_id'");
  $unlock=$connect->query("UNLOCK TABLES");
  $connect->close();
  echo "Task has been sent";
?>
