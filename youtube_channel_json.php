<?php

// $videoList = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId='.$channelID.'&maxResults='.$maxResults.'&key='.$API_key.''));
$channelDetails = json_decode(file_get_contents("https://www.googleapis.com/youtube/v3/channels?part=snippet%2CcontentDetails%2Cstatistics&forUsername=NBA&key=AIzaSyBgscBbos02eDPybfMwKHBgEBl9S7zd2Q0"));
$videoList = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId=UCWJ2lWNubArHWmf3FIHbfcQ&maxResults=50&key=AIzaSyBgscBbos02eDPybfMwKHBgEBl9S7zd2Q0'));
// var_dump($videoList) ;

// echo json_encode($videoList);
// echo $channelDetails->items[0]->snippet->title;
// echo $channelDetails->items[0]->snippet->description;

// $user["details"] = $channelDetails;
// $user["video"] = $videoList;
// $json_merge = json_encode($user);

// echo $json_merge;

	# code...
// foreach($videoList->items as $item){
//     //Embed video
//     // echo json_encode($item);
//     if(isset($item->id->videoId)){
//         echo '<div class="youtube-video">
//                 <iframe width="280" height="150" src="https://www.youtube.com/embed/'.$item->id->videoId.'" frameborder="0" allowfullscreen></iframe>
//                 <h2>'. $item->snippet->title .'</h2>
//             </div>';

//     }
// }



?>