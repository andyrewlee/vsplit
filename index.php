<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Split Screen</title>
    <link href="style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script>
      $(document).ready(function(){

        $('#left_screen .screen').submit(function(e){
            alert('left');
            $.post('process.php', $(this).serialize(), function(data) {
              $('#left_frame').html(data);
            });
            return false;
        });

        $('#right_screen .screen').submit(function(e){
            alert('right');
            $.post('process.php', $(this).serialize(), function(data) {
              $('#right_frame').html(data);
            });
            return false;
        });

        $(document).on('click', '#left_screen a', function(e) {
            e.preventDefault();
            // if href starts with the root then don't do anything
            // if href doesn't start with root then add root to front
            // then send ajax request with the url
            console.log($(this).attr('href'));

            var url;
            var parser = document.createElement('a');
            parser.href = $(this).attr('href');

            console.log('protocol', parser.protocol);
            console.log('hostname', parser.hostname);
            console.log('pathname', parser.pathname);
            console.log('search', parser.search);
            console.log('hash', parser.hash);
        });

        $(document).on('click', '#right_screen a', function(e) {
            e.preventDefault();
            // if href starts with the root then don't do anything
            // if href doesn't start with root then add root to front
            // then send ajax request with the url
            console.log($(this).attr('href'));

            var url;
            var parser = document.createElement('a');
            parser.href = $(this).attr('href');

            console.log('protocol', parser.protocol);
            console.log('hostname', parser.hostname);
            console.log('pathname', parser.pathname);
            console.log('search', parser.search);
            console.log('hash', parser.hash);
        });

      });

    </script>
  </head>
  <body>
    <div id="container">
      <div id="left_screen">
        <form class="screen" id="left" action="process.php" method="post">
          <input type="hidden" name="side" value="left">
          <input type="text" name="url">
        </form>
        <div id="left_frame"></div>
      </div>
      <div id="right_screen">
        <form class="screen" id="right" action="process.php" method="post">
          <input type="hidden" name="side" value="right">
          <input type="text" name="url">
        </form>
        <div id="right_frame"></div>
      </div>
    </div>
  </body>
</html>
