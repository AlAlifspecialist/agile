<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
}
echo "<h2>Welcome to StayNest</h2>";
echo "<a href='properties/list.php'>View Properties</a>";
echo "<br><a href='bookings/mybookings.php'>My Bookings</a>";
echo "<br><a href='logout.php'>Logout</a>";
?>