
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
      background: #30A64c;


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
      background: #DC5D02;
    }
    #right-arrow{
      top: 125px;
      left:515px;
      height:150px;
    }

  </style>
  <meta http-equiv="refresh" content="10; url=guage2.php" />
</head>
<body>
  <div id="wrapper">

    <div id="left">
      <img src="images/concept.gif">
    </div>

    <div id="right">
      <img   src="images/challenge.gif">
    </div>
    <!--  numbers 36 degrees apart -->
        <img id="left-arrow" style="transform:rotate(224.25deg);" src="images/concept-arrow.gif">
    <div id="left-text" style="top:375px;left:0px;" >
      <div id="percent" style="left:10px;">
        <img class="txt1" style="height:70px;top:0px;left:0px;" src="images/6.gif">
        <img class="txt" style="height:40px;top:5px;left:40px;" src="images/out-of-10-.gif">

      </div>
      <img class="txt" style="top:45px;left:65px;" src="images/average.gif">
    </div>
    <!-- RIGHT  -->
    <img id="right-arrow" style="transform:rotate(230.75deg);" src="images/challenge-arrow.gif">
    <div id="right-text" style="top:375px;left:420px;" >
      <div id="percent2" style="left:0px;">
        <img class="txt1" style="height:70px;top:0px;left:10px;" src="images/6.gif">
        <img class="txt" style="height:40px;top:5px;left:50px;" src="images/out-of-10-.gif">

      </div>
      <img class="txt" style="top:45px;left:70px;" src="images/average.gif">
    </div>

  </div>
</body>

</html>
