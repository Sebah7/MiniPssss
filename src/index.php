<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Sebah's Kanban</title>
   <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
   <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
   <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

   <!-- TODO: Lägg till styles -->
   <style>
      body {
  margin: 20px auto;
  font-family: 'Lato';
}
  #todo, #doing, #done{
    border: 3px solid #3498db;
    width: 142px;
    min-height: 20px;
    list-style-type: none;
    margin: 0;
    padding: 5px 0 0 0;
    float: left;
    margin-right: 10px;
    border-radius: 0.5em;
  }
  #todo li, #doing li, #done li{
   background-color: #f0f7fb;
     border-left: solid 4px #3498db;
     line-height: 18px;
     overflow: hidden;
     padding: 12px;
     margin: 10px;
  }
  h3 {
  font-weight: bold;
  color: #3498db;
  font-size: 2rem;
}
  </style>

   <!-- TODO: lägg till JQuery för att connecta de olika listorna 
   och för att posta id och state till "/api/update_tasks.php" --> 
   <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#todo, #doing, #done").sortable({
      connectWith: ".connectedDefault",
      receive: function( event, ui ) {
         var id = $(ui.item).attr('id');
         var state = this.id;
         $.post("/api/update_tasks.php", {id: id, state: state});
      }
    });
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
   <ul id="todo" class="connectedDefault">
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
   <ul id="doing" class="connectedDefault">
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
   <ul id="done" class="connectedDefault">
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