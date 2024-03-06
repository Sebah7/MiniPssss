<!DOCTYPE html>
<html>

<head>
   <title>jQuery UI Sortable - Example</title>
   <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
   <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
   <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

   <!-- TODO: Lägg till styles -->
   <style>
      
   </style>

   <!-- TODO: lägg till JQuery för att connecta de olika listorna 
   och för att posta id och state till "/api/update_tasks.php" --> 
   <script>
      $(function() {
         
      });
   </script>
</head>

<?php
require("includes/conn_mysql.php");
require("includes/tasks_functions.php");

$connection = dbConnect();
$allTodos = getAllTodos($connection);
$allDoing = getAllDoing($connection);
$allDone = getAllDone($connection);

dbDisconnect($connection);
?>

<body>
   <ul id="todo">
      <h3>Todo-list</h3>
      <?php
      foreach ($allTodos as $item) {
         print('<li class="default" ');
         print('id="');
         print($item['id'] . '">');
         print($item['name']);
         print('</li>');
      }
      ?>
   </ul>
   <ul id="doing">
      <h3>Doing-list</h3>
      <?php
      foreach ($allDoing as $item) {
         print('<li class="default" ');
         print('id="');
         print($item['id'] . '">');
         print($item['name']);
         print('</li>');
      }
      ?>
   </ul>
   <ul id="done">
      <h3>Done-list</h3>
      <?php
      foreach ($allDone as $item) {
         print('<li class="default" ');
         print('id="');
         print($item['id'] . '">');
         print($item['name']);
         print('</li>');
      }
      ?>
   </ul>
</body>

</html>