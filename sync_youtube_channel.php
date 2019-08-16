<?php
	$servername = "localhost:3307";
	$username = "root";
	$password = "";
	$dbname = "youtube_app";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 



	//save videos




	 include('simple_html_dom.php');

	 $websiteUrl = 'https://www.youtube.com/user/NBA/videos';
	 $websiteUrl2 = 'https://www.youtube.com/user/NBA/about';

	 $html = file_get_html($websiteUrl);
	  $html2 = file_get_html($websiteUrl2);

	// echo $html2;

	// for channel info  about-metadata-container

	  foreach ($html->find('.primary-header-upper-section-block') as $postDiv) {
			// echo '<pre>';
			// die (var_dump($postDiv));

			foreach ($postDiv->find('a') as $a){
					$name = $a->innertext;//NBA

				// query
				$sql = "UPDATE youtube_channels SET name = '$name' WHERE channel_id = 1";

				if ($conn->query($sql) === TRUE) {
				    echo $name;
				} else {
				    // echo "Error: " . $sql . "<br>" . $conn->error;
				}

				// $conn->close();
			}

		}

		foreach ($html2->find('div.about-metadata-container') as $channeldesc){
			$thedesc = str_get_html($channeldesc);
			foreach ($html2->find('pre') as $pre){
				$descr =  $pre->outertext;
				// ->innertext."<br>";//Description

			}
		}
		foreach ($html2->find('img.channel-header-profile-image') as $channelimg){
				$prof = $channelimg->outertext;
				// ->innertext."<br>";//img
				$sql3 = "UPDATE youtube_channels SET profile_picture = '$prof',description = '$descr' WHERE channel_id = 1";

				if ($conn->query($sql3) === TRUE) {
				    echo $prof;
				    echo $descr;
				} else {
				    echo "Error: " . $sql3	 . "<br>" . $conn->error;
				}
		}




// saving videos
	$video_title = array();
	$video_thumbnails = array();
	foreach ($html->find('ul#channels-browse-content-grid') as $postDiv2) {
	
			// echo $postDiv2->innertext. "<br";

			foreach ($postDiv2->find('h3.yt-lockup-title') as $h3)
				$video_title [] =  $h3->innertext;
				// 
			foreach($postDiv2->find('span.yt-thumb-clip') as $e)
				$video_thumbnails [] = $e->outertext;
			
		// }
	}
	// var_dump( $video_title);
	// var_dump( $video_thumbnails);
	for ($i=0; $i < sizeof($video_thumbnails); $i++) { 
		$vt = $video_title[$i];
		$vtm = $video_thumbnails[$i];
		$sql4 = "INSERT INTO youtube_channel_videos (video_title , video_thumb) values ('$vt','$vtm')";
		if ($conn->query($sql4) === TRUE) {
		    // echo $prof;
		    // echo $descr;
		} else {
		    echo "Error: " . $sql4	 . "<br>" . $conn->error;
		}
	}




?>
