<?php
// error_reporting(0);
// the table
$answersTable="survey-answers";
//
// $dbhost = 'localhost';
// $dbdatabase='eatmydata';
// $dbusername = 'root';
// $dbpassword = '7hathaway';

// $dbhost = 'cust-mysql-123-02';
// $dbdatabase='eatmydatacouk_392470_db1';
// $dbusername = 'ueat_392470_0001';
// $dbpassword = 'slashback';

// deepdrizzle
$dbhost = 'localhost';
$dbdatabase='deepdri';
$dbusername = 'deepdri_dane';
$dbpassword = 'slashback';



  $conn = new mysqli($dbhost, $dbusername, $dbpassword, $dbdatabase);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
  // echo "nice one!";
}
$questions=array(3,4,6,9);
$answers=array();
$answerX=array();
for( $j = 0; $j<4; $j++ ) {
	$sql = "SELECT * FROM `$answersTable` WHERE page =$questions[$j] AND answer != 'under 16' AND answer != 'skip' ORDER BY `$answersTable`.`timestamp` ASC  ";
	// echo $questions[$j] ;
	$result = $conn->query($sql);
	$i=0;

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){

			$answer = explode(",", $row["answer"]);
			// $answerX+=intval($answer[0]);

			$answerX[$questions[$j]]['total']+=intval($answer[0]);
			$i++;
			$answerX[$questions[$j]]['number']=$i;
			//
			$deductMargin=(intval($answer[0])-72);
			if($deductMargin>750)$deductMargin=750;
			$percentage=($deductMargin/750)*100;
			$answerX[$questions[$j]]['totalAvg']+=$percentage;
			}
		}
			else {
					$answerX=0;
			}
			$answers[$questions[$j]]=$answerX;

  }
// var_dump($answerX);
date_default_timezone_set("Europe/London");
$date = date('Y-m-d H:i', time());
// echo $date;
// echo '<?php'. PHP_EOL;
echo '$date = "'.$date.'";'. PHP_EOL;
echo '$concept = '.round($answerX[3]['totalAvg']/$answerX[3]['number']).";". PHP_EOL;
echo '$presentation = '.round($answerX[4]['totalAvg']/$answerX[4]['number']).";". PHP_EOL;
echo '$challenge = '.round($answerX[6]['totalAvg']/$answerX[6]['number']).";". PHP_EOL;
echo '$relevance = '.round($answerX[9]['totalAvg']/$answerX[9]['number']).";". PHP_EOL;


?>
