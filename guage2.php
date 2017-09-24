
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
        <!--  numbers 36 degrees apart -->
    <!-- left -->
    <div id="left">
      <img src="images/relevance.gif">
    </div>
    <img id="left-arrow" style="transform:rotate(255.6deg);" src="images/relevance-arrow.gif">
    <div id="left-text" style="top:380px;left:25px;" >
      <div id="percent" style="left:0px;">
        <img class="txt1" style="height:60px;top:0px;left:0px;" src="images/7.gif">
        <img class="txt" style="height:40px;top:5px;left:30px;" src="images/out-of-10.gif">
      </div>
      <img class="txt" style="height:30px;top:45px;left:50px;" src="images/average.gif">
    </div>

    <!-- right -->
    <div id="right">
      <img   src="images/presentation.gif">
    </div>
    <img id="right-arrow" style="transform:rotate(227.8deg);" src="images/presentation-arrow.gif">
    <div id="right-text" style="top:370px;left:425px;" >
      <div id="percent2" style="left:0px;">
        <img class="txt1" style="height:70px;top:0px;left:0px;" src="images/6.gif">
        <img class="txt" style="height:40px;top:15px;left:40px;" src="images/out-of-10.gif">

      </div>
      <img class="txt" style="height:30px;top:55px;left:60px;" src="images/average.gif">
    </div>

  </div>
</body>

</html>
