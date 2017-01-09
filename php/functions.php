<?php
  class Tasker {

    public function connectDB() {
      $mysqli=new mysqli (DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
      $mysqli->query("SET NAMES 'utf-8'");
      return $mysqli;
    }

    public function implementFilters($input, $connect) {
      $output=trim($input);
      $output=mysqli_real_escape_string($connect, $output);
      return $output;
    }

    public function getData($connect) {
      $result=$connect->query("SELECT * FROM `tasks` ORDER BY `id` DESC");
      $array=array();
      while (($row=$result->fetch_assoc())!=false)
        $array[]=$row;
      return $array;
    }

    public function incrementUsage($id, $connect) {
      $result=$connect->query("UPDATE `urls` SET `count`=`count`+1 WHERE `id`='$id'");
    }

  }

  class SimpleImage {

   var $image;
   var $image_type;

   public function load($filename) {
      $image_info=getimagesize($filename);
      $this->image_type=$image_info[2];
      if ($this->image_type==IMAGETYPE_JPEG) {
         $this->image=imagecreatefromjpeg($filename);
      }
      elseif ($this->image_type==IMAGETYPE_GIF) {
         $this->image=imagecreatefromgif($filename);
      }
      elseif ($this->image_type==IMAGETYPE_PNG) {
         $this->image=imagecreatefrompng($filename);
      }
   }

   public function save($filename) {
      if ($this->image_type==IMAGETYPE_JPEG) {
         imagejpeg($this->image, $filename, 75);
      }
      elseif ($this->image_type==IMAGETYPE_GIF) {
         imagegif($this->image, $filename);
      }
      elseif ($this->image_type==IMAGETYPE_PNG) {
         imagepng($this->image, $filename);
      }
      chmod($filename, 0755);
   }

   public function getWidth() {
      return imagesx($this->image);
   }
   
   public function getHeight() {
      return imagesy($this->image);
   }

   public function resizeToHeight($height) {
      $ratio=$height/$this->getHeight();
      $width=$this->getWidth()*$ratio;
      $this->resize($width,$height);
   }

   public function resizeToWidth($width) {
      $ratio=$width/$this->getWidth();
      $height=$this->getheight()*$ratio;
      $this->resize($width,$height);
   }

   public function resize($width,$height) {
      $new_image=imagecreatetruecolor($width, $height);
      imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
      $this->image=$new_image;
   }
}
?>
