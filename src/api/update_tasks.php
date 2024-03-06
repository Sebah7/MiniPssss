<?php
require("../includes/conn_mysql.php");
require("../includes/tasks_functions.php");

$conn = dbConnect();

updateTasks($conn);

dbDisconnect($conn);
?>