<?php require_once('youtube_channel_json.php'); ?>

<?php
$servername = "localhost:3307";
$username = "root";
$password = "password";
$dbname = "youtube_app";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
	$name =$channelDetails->items[0]->snippet->title;
	$prof = $channelDetails->items[0]->snippet->thumbnails->default->url;
	$desc = $channelDetails->items[0]->snippet->description;

	$sql = "UPDATE youtube_channels SET name = '$name',profile_picture = '$prof',description = '$desc' WHERE channel_id = 1";

	if ($conn->query($sql) === TRUE) {
	    echo "save";
	}

	foreach($videoList->items as $item){
	    //Embed video
	    // echo json_encode($item);
	    $vt = $item->snippet->title;
		$vtm = "https://www.youtube.com/embed/".$item->id->videoId;
		$sql4 = "INSERT INTO youtube_channel_videos (video_title , video_thumb) values ('$vt','$vtm')";
		if ($conn->query($sql4) === TRUE) {
		    echo "save";
		}
	}
?>