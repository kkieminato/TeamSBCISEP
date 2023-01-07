<?php include('session.php'); ?>
<?php include('header_dashboard.php'); ?>

<?php $get_id = $_GET['id']; ?>
<?php 
   ob_start();
include('student_general_link.php'); 
ob_end_clean();
?>
<body id="class_div">
	
    <section class="home">
	
	
      
					  <!-- breadcrumb -->
				
          	<?php $class_query = mysqli_query($conn,"select * from teacher_class
										LEFT JOIN class ON class.class_id = teacher_class.class_id
										LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
										LEFT JOIN conference_meeting ON conference_meeting.class_id = teacher_class.class_id
                    where teacher_class_id = '$get_id'")or die(mysqli_error());
										$class_row = mysqli_fetch_array($class_query);
										?>
				

								<script>
  var script = document.createElement("script");
  script.type = "text/javascript";

  script.addEventListener("load", function (event) {
    const config = {
      name: "<?php echo $row['firstname'] . " " . $row['lastname'];  ?>",
      meetingId: "<?php echo $class_row['meetingId'] ?>",
      apiKey: "53950e0c-068b-4e02-b62e-f298f47c21d7",

      containerId: null,

      micEnabled: true,
      webcamEnabled: true,
      participantCanToggleSelfWebcam: true,
      participantCanToggleSelfMic: true,
		
      chatEnabled: true,
      screenShareEnabled: true,
      theme: "LIGHT",
      permissions: {
            askToJoin: true, // Ask joined participants for entry in meeting
            toggleParticipantMic: true, // Can toggle other participant's mic
            toggleParticipantWebcam: true, // Can toggle other participant's webcam
            removeParticipant: false, // Remove other participant from meeting
            endMeeting: false, // End meeting for all participant
            drawOnWhiteboard: true, // Can Draw on whiteboard
            toggleWhiteboard: true, // Can toggle whiteboard
            toggleRecording: true, // Can toggle recording
          },

          joinScreen: {
            visible: true, // Show the join screen ?
            title: "<?php echo $class_row['title'] ?>", // Meeting title
            meetingUrl: window.location.href, // Meeting joining url
          },

          pin: {
            allowed: true, // participant can pin any participant in meeting
            layout: "SPOTLIGHT", // meeting layout - GRID | SPOTLIGHT | SIDEBAR
          },

          leftScreen: {
            // visible when redirect on leave not provieded
            actionButton: {
              // optional action button
              label: "Video SDK Live", // action button label
              href: "https://videosdk.live/", // action button href
            },
          },
        };
    const meeting = new VideoSDKMeeting();
    meeting.init(config);
  });

  script.src =
    "https://sdk.videosdk.live/rtc-js-prebuilt/0.3.23/rtc-js-prebuilt.js";
  document.getElementsByTagName("head")[0].appendChild(script);
</script>
  
<?php $query = mysqli_query($conn, "select * from student where student_id = '$session_id'") or die(mysqli_error());
                     $row = mysqli_fetch_array($query);
                     ?>	  
		<?php include('script.php'); ?>
	</section>
    </body>
</html>