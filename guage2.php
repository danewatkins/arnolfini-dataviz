<?php include('guage-data/include.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <style>
  body{
    overflow:hidden;
  }
  div, img{
    position: absolute;
  }
  .txt{
    height:30px;
  }
    #wrapper{
      top: 0px;
      left: 0px;
      width:800px;
      height:480px;
    }
    #left{
      top: 0px;
      left: 0px;
      width:400px;
      height:500px;
      background: #DC5D02;


    }
    #left-arrow{
      top: 125px;
      left:170px;
      height:150px;

    }
    #right{
      top: 0px;
      left: 400px;
      width:410px;
      height:500px;
      background: #B2E392;
    }
    #right-arrow{
      top: 125px;
      left:575px;
      height:150px;
    }

  </style>
  <meta http-equiv="refresh" content="10; url=index.php" />
</head>
<body>
  <div id="wrapper">
    <?php

    // $relevance = $_GET["relevance"];
    // $presentation = $_GET["presentation"];

    $relevanceNumbers = str_split($relevance);
    $presentationNumbers = str_split($presentation);


    $relevanceDegrees=$relevance*3.6;
    $presentationDegrees=$presentation*3.4;



     ?>
    <!--  numbers 36 degrees apart -->
    <!-- left -->
    <div id="left">
      <img src="images/relevance.gif">
    </div>
    <img id="left-arrow" style="transform:rotate(<?php echo $relevanceDegrees ?>deg);" src="images/relevance-arrow.gif">
    <div id="left-text" style="top:380px;left:65px;" >
      <div id="percent" style="left:30px;">
        <img class="txt1" style="height:60px;top:0px;left:0px;" src="images/<?php echo $relevanceNumbers[0] ?>.gif">
        <img class="txt" style="height:40px;top:5px;left:30px;" src="images/out-of-10-.gif">
      </div>
      <img class="txt" style="height:30px;top:45px;left:0px;" src="images/average.gif">
    </div>

    <!-- right -->
    <div id="right">
      <img   src="images/presentation.gif">
    </div>
    <img id="right-arrow" style="transform:rotate(<?php echo $presentationDegrees ?>deg);" src="images/presentation-arrow.gif">
    <div id="right-text" style="top:370px;left:475px;" >
      <div id="percent2" style="left:20px;">
        <img class="txt1" style="height:70px;top:0px;left:0px;" src="images/<?php echo $presentationNumbers[0] ?>.gif">
        <img class="txt" style="height:40px;top:15px;left:40px;" src="images/out-of-10-.gif">

      </div>
      <img class="txt" style="height:30px;top:55px;left:0px;" src="images/average.gif">
    </div>

  </div>
</body>

</html>
