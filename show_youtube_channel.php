<!DOCTYPE html>
<html lang="en">
<?php require_once('youtube_channel_json.php'); ?>
	<head>
		<title>Youtube App</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<style>
			.yt-tab{
				list-style: none;
				border-bottom:2px solid #000;

			}
			.yt-tab li{
				display: inline-block;
				padding:10px;

			}
			.yt-tab li button.active{
				color:red;
			}
			.yt-tab li button{
				color:#000;
				background: none;
				border: none
			}
		</style>
	</head>
	<body>
		<div class="col-sm-12" style="padding-left:20%;padding-right:20%">
			<div class="col-sm-12 border">
				<div class="col-sm-2">
					<img src="<?php echo $channelDetails->items[0]->snippet->thumbnails->default->url; ?>">
					
					<?php echo $channelDetails->items[0]->snippet->title; ?>
				</div>
				
					
				
			</div>
			<div class="col-sm-12 border">
					<ul class="yt-tab" id="nav-tab">
						<li><button  class="tablinks" onclick="openTab(event, 'yt-desc')">About</button></li>
						<li><button  class="tablinks" onclick="openTab(event, 'yt-vid')">Videos</button></div></li>
					</ul>
				
			<div class="col-sm-12 border active" id="yt-desc">
				Description:
				<p style="text-indent:20px" id=""><?php echo $channelDetails->items[0]->snippet->description; ?></p>
			</div>


			<div class="col-sm-12 border tabcontent" id="yt-vid" style="display:none">
				Videos:
				<?php
						foreach($videoList->items as $item){
						    //Embed video
						    // echo json_encode($item);
						    if(isset($item->id->videoId)){
						        echo '<div class="youtube-video" style="border-bottom:1px solid #000;">
						                <iframe width="280" height="150" src="https://www.youtube.com/embed/'.$item->id->videoId.'" frameborder="0" allowfullscreen></iframe>
						                <h5>'. $item->snippet->title .'</h5>
						            </div><br>';

						    }
						}
				?>
			</div>
		</div>
	
	</body>


</html>

<script type="text/javascript">
	function openTab(evt, cityName) {
	  var i, tabcontent, tablinks;
	  tabcontent = document.getElementsByClassName("tabcontent");
	  for (i = 0; i < tabcontent.length; i++) {
	    tabcontent[i].style.display = "none";
	  }
	  tablinks = document.getElementsByClassName("tablinks");
	  for (i = 0; i < tablinks.length; i++) {
	    tablinks[i].className = tablinks[i].className.replace(" active", "");
	  }
	  document.getElementById(cityName).style.display = "block";
	  evt.currentTarget.className += " active";
	}
</script>

