<?php
include("includes/header.php");


if (isset($_POST['post'])) {
    $post = new Post($con, $userLoggedIn);
    $post->submitPost($_POST['post_text'], 'none');
    header("Location: index.php");
}


 ?>
	<div class="user_details column">
		<a href="<?php echo $userLoggedIn; ?>">  <img src="<?php echo $user['profile_pic']; ?>"> </a>

		<div class="user_details_left_right">
			<a href="<?php echo $userLoggedIn; ?>">
			<?php
            echo $user['first_name'] . " " . $user['last_name'];

             ?>
			</a>
			<br>
			<?php echo "Posts: " . $user['num_posts']. "<br>";
            echo "Likes: " . $user['num_likes'];

            ?>
		</div>

	</div>

	<div class="main_column column">
		<form class="post_form" action="index.php" method="POST">
			<textarea name="post_text" id="post_text" placeholder="Got something to say?"></textarea>
			<input type="submit" name="post" id="post_button" value="Post">
			<hr>

		</form>

		<div class="posts_area"></div>
		<img id="loading" src="assets/images/icons/loading.gif">


	</div>

	<script>
	var userLoggedIn = '<?php echo $userLoggedIn; ?>';

	$(document).ready(function() {

		$('#loading').show();

		//Original ajax request for loading first posts
		$.ajax({
			url: "includes/handlers/ajax_load_posts.php",
			type: "POST",
			data: "page=1&userLoggedIn=" + userLoggedIn,
			cache:false,

			success: function(data) {
				$('#loading').hide();
				$('.posts_area').html(data);
			}
		});

		$(window).scroll(function() {
			var height = $('.posts_area').height(); //Div containing posts
			var scroll_top = $(this).scrollTop();
			var page = $('.posts_area').find('.nextPage').val();
			var noMorePosts = $('.posts_area').find('.noMorePosts').val();

			if ((document.body.scrollHeight == document.body.scrollTop + window.innerHeight) && noMorePosts == 'false') {
				$('#loading').show();

				var ajaxReq = $.ajax({
					url: "includes/handlers/ajax_load_posts.php",
					type: "POST",
					data: "page=" + page + "&userLoggedIn=" + userLoggedIn,
					cache:false,

					success: function(response) {
						$('.posts_area').find('.nextPage').remove(); //Removes current .nextpage
						$('.posts_area').find('.noMorePosts').remove(); //Removes current .nextpage

						$('#loading').hide();
						$('.posts_area').append(response);
					}
				});

			} //End if

			return false;

		}); //End (window).scroll(function())


	});

	</script>

 <div id="map" class="jam_map"></div>
 <script>
       var customLabel = {
         jamroom: {
           label: 'J'
         }
       };

         function initMap() {
         var map = new google.maps.Map(document.getElementById('map'), {
           center: new google.maps.LatLng(19.023681, 72.851358),
           zoom: 16
         });
         var infoWindow = new google.maps.InfoWindow;


           downloadUrl('assets/mapdata.xml', function(data) {
             var xml = data.responseXML;
             var markers = xml.documentElement.getElementsByTagName('marker');
             Array.prototype.forEach.call(markers, function(markerElem) {
               var name = markerElem.getAttribute('name');
               var address = markerElem.getAttribute('address');
               var Information = markerElem.getAttribute('info');
               var type = markerElem.getAttribute('type');
               var point = new google.maps.LatLng(
                   parseFloat(markerElem.getAttribute('lat')),
                   parseFloat(markerElem.getAttribute('lng')));

               var infowincontent = "<div><strong>"+name+"</strong></br><u>"+Information+"</u></br><text>Address:<span style='color:#611b05'>"+address+"</span></text></div>"

               var icon = customLabel[type] || {};
               var marker = new google.maps.Marker({
                 map: map,
                 position: point,
                 label: icon.label
               });
                 marker.addListener('click', function() {
                 infoWindow.setContent(infowincontent);
                 infoWindow.open(map, marker);


               });
             });
           });
         }


      function mpost() {
        alert("Hello demom");
      }


       function downloadUrl(url, callback) {
         var request = window.ActiveXObject ?
             new ActiveXObject('Microsoft.XMLHTTP') :
             new XMLHttpRequest;

         request.onreadystatechange = function() {
           if (request.readyState == 4) {
             request.onreadystatechange = doNothing;
             callback(request, request.status);
           }
         };

         request.open('GET', url, true);
         request.send(null);
       }

       function doNothing() {}
     </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAG7ahdczVoxoOgiYlhKeJYBDcF710M40s&callback=initMap">
  </script>



	</div>
</body>
</html>
