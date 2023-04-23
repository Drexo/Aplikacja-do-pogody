<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>Document</title>
</head>
<body>
  <header>
    <img src="" class="img-fluid">
    <nav>
      <ul class="d-flex">
        <form action="weather.php">
          <input name="town" id="town" placeholder="town name">
          <button type="button">Click Me</button>
        </form>
        <li>Celcius</li>
        <li>Farenheit</li>
      </ul>
    </nav>
  </header>

<div class="container">
  <div class="row">
    <div class="col-6"></div>
    <div class="col-6 d-flex flex-col">
      <p>Currently in <span class="town_name"></span>It's:</p>
      <div><p class="weather"></p><p class="temp"></p></div>
    </div>
  </div>
</div>
  <script>
    $(document).ready(function(){
        $("button").on('click', function(){
            name = $("#town").val();
            /*For PHP called is for Cross-Origin Request Blocked*/
            $.ajax({
               type:"GET",
               dataType: "json",
               data:{town: name},
               url:"weather.php",
               success:function(data)
               {
                   console.log(data);
                  $('.town_name').html(data['name']);
                  $('.weather').html(data['weather'][0]['description']);
                  $('.temp').html(Math.round(data['main']['temp'] - 273));
               }
            });
        });
    });
</script>
</body>
</html>
<?php

