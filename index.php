<?php 

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

		foreach ($postDiv->find('a') as $a)
				echo $a->innertext. "<br>";//NBA

	}

	foreach ($html2->find('div.about-metadata-container') as $channeldesc){
		$thedesc = str_get_html($channeldesc);
		foreach ($html2->find('pre') as $pre){
			echo $pre->outertext."<br>";
			// ->innertext."<br>";//Description
		}
	}
	foreach ($html2->find('img.channel-header-profile-image') as $channelimg){
			echo $channelimg->outertext."<br>";
			// ->innertext."<br>";//img
	}
		


	echo "<hr>";
	echo "<h2>VIDEOS</h2>"; 	






// style-scope ytd-c4-tabbed-header-renderer

	


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
	echo "<ul>";
	for ($i=0; $i < sizeof($video_thumbnails); $i++) { 
		$vt = $video_title[$i];
		$vtm = $video_thumbnails[$i];
		echo 
			"<li>".$vtm." ".$vt." "."</li>";
		// 
	}
	echo "</ul>";

	





?>