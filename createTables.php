<?php
include('models/Db.php');


$query = "CREATE TABLE IF NOT EXISTS `admin` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `username` varchar(100) NOT NULL,
            `email` varchar(100) NOT NULL,
            `password` varchar(100) NOT NULL,
            PRIMARY KEY (`id`)
          )";
mysqli_query($conn, $query);


// admin password is 123456
$query = "INSERT INTO `admin` (`username`, `email`, `password`) VALUES
        ('Nicki', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e')";
mysqli_query($conn, $query);

$query = "CREATE TABLE IF NOT EXISTS `artists` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `Name` varchar(30) NOT NULL,
            `DOB` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `joined_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`)
          )";
mysqli_query($conn, $query);


$query =" CREATE TABLE IF NOT EXISTS `art_work` (
            `art_id` int(11) NOT NULL AUTO_INCREMENT,
            `name` text NOT NULL,
            `created_on` datetime NOT NULL,
            `price` decimal(10,0) NOT NULL,
            `location` text NOT NULL,
            `artist_id` int(11) NOT NULL,
            `art_style` text NOT NULL,
            `on_sale` tinyint(1) NOT NULL DEFAULT '0',
            `art_image` varchar(100) NOT NULL,
            `description` text NOT NULL,
            PRIMARY KEY (`art_id`),
            FOREIGN KEY (`artist_id`) REFERENCES artists(`id`)
          )";
mysqli_query($conn, $query);

$query =" CREATE TABLE IF NOT EXISTS `transaction` (
            `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
            `customer_name` text NOT NULL,
            `phone_number` int(11) NOT NULL,
            `email` varchar(100) NOT NULL,
            `art_id` int(11) NOT NULL,
            `artist_id` int(11) NOT NULL,
            `date_sold` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `passport_number` int(11) NOT NULL,
            `price` decimal(10,0) NOT NULL,
            PRIMARY KEY (`transaction_id`),
            FOREIGN KEY (`art_id`) REFERENCES art_work(`art_id`),
            FOREIGN KEY (`artist_id`) REFERENCES artists(`id`)
          )";
mysqli_query($conn, $query);



 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php include('inc/head.php') ?>

<?php include('inc/navbar.php') ?>
  <body>

    <div class="container mt-5 pt-5">
      <a href="index.php" class="btn btn-danger mb-3">GO LOGIN</a>
      <div class="alert alert-success">
        <h4>
          Well Done You have created the following tables
        </h4>
      </div>

      <div class="card">
        <div class="card-header">
          <h4>admin</h4>
        </div>
        <div class="card-body bg-dark text-light">
           <p>"CREATE TABLE IF NOT EXISTS `admin` ( <br>
                       `id` int(11) NOT NULL AUTO_INCREMENT,<br>
                       `username` varchar(100) NOT NULL,<br>
                       `email` varchar(100) NOT NULL,<br>
                       `password` varchar(100) NOT NULL,<br>
                       PRIMARY KEY (`id`)<br>
                     )";</p>
        </div>
      </div>



      <div class="card">
        <div class="card-header">
          <h4>artists</h4>
        </div>
        <div class="card-body bg-dark text-light">
           <p>"CREATE TABLE IF NOT EXISTS `artists` (<br>
                       `id` int(11) NOT NULL AUTO_INCREMENT,<br>
                       `Name` varchar(30) NOT NULL,<br>
                       `DOB` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,<br>
                       `joined_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,<br>
                       PRIMARY KEY (`id`)<br>
                     )";</p>
        </div>
      </div>


      <div class="card">
        <div class="card-header">
          <h4>art_work</h4>
        </div>
        <div class="card-body bg-dark text-light">
           <p>" CREATE TABLE IF NOT EXISTS `art_work` ( <br>
                       `art_id` int(11) NOT NULL AUTO_INCREMENT,<br>
                       `name` text NOT NULL,<br>
                       `created_on` datetime NOT NULL,<br>
                       `price` decimal(10,0) NOT NULL,<br>
                       `location` text NOT NULL,<br>
                       `artist_id` int(11) NOT NULL,<br>
                       `art_style` text NOT NULL,<br>
                       `on_sale` tinyint(1) NOT NULL DEFAULT '0',<br>
                       `art_image` varchar(100) NOT NULL,<br>
                       `description` text NOT NULL,<br>
                       PRIMARY KEY (`art_id`),<br>
                       FOREIGN KEY (`artist_id`) REFERENCES artists(`id`)<br>
                     )";</p>
        </div>
      </div>


      <div class="card">
        <div class="card-header">
          <h4>transaction</h4>
        </div>
        <div class="card-body bg-dark text-light">
           <p>" CREATE TABLE IF NOT EXISTS `transaction` (<br>
             <!-- <span class="bg-white text-dark"> -->
                       `transaction_id` int(11) NOT NULL AUTO_INCREMENT,<br>
                       `customer_name` text NOT NULL,<br>
                       `phone_number` int(11) NOT NULL,<br>
                       `email` varchar(100) NOT NULL,<br>
                       `art_id` int(11) NOT NULL,<br>
                       `artist_id` int(11) NOT NULL,<br>
                       `date_sold` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,<br>
                       `passport_number` int(11) NOT NULL,<br>
                       `price` decimal(10,0) NOT NULL,<br>
                       PRIMARY KEY (`transaction_id`),<br>
                       FOREIGN KEY (`art_id`) REFERENCES art_work(`art_id`),<br>
                       FOREIGN KEY (`artist_id`) REFERENCES artists(`id`)<br>
                       <!-- </span> -->
                     )";</p>
        </div>
      </div>





     <a href="index.php" class="btn btn-danger mt-3">GO LOGIN</a>
    </div>

  </body>
</html>
