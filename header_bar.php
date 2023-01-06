<center>
			<div class="container-fluid">

				

				
               
				<div class="nav-collapse collapse">
                   
					<ul class="nav pull-right">
                 
                   <li> <a id="clockbox" class="pull-left"></a></li>
                   <?php
											$mission_query = mysqli_query($conn,"select * from content where title  = 'Facebook' ")or die(mysqli_error());
											$mission_row = mysqli_fetch_array($mission_query);
											
										?>
                   <li> <a  href="<?php echo $mission_row['content']; ?>" class="pull-right">Facebook</a></li>

<script type="text/javascript">
var tday=["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
var tmonth=["January","February","March","April","May","June","July","August","September","October","November","December"];

function GetClock(){
var d=new Date();
var nday=d.getDay(),nmonth=d.getMonth(),ndate=d.getDate(),nyear=d.getFullYear();
var nhour=d.getHours(),nmin=d.getMinutes(),nsec=d.getSeconds(),ap;

if(nhour==0){ap=" AM";nhour=12;}
else if(nhour<12){ap=" AM";}
else if(nhour==12){ap=" PM";}
else if(nhour>12){ap=" PM";nhour-=12;}

if(nmin<=9) nmin="0"+nmin;
if(nsec<=9) nsec="0"+nsec;

var clocktext=""+tday[nday]+", "+tmonth[nmonth]+" "+ndate+", "+nyear+" "+nhour+":"+nmin+":"+nsec+ap+"";
document.getElementById('clockbox').innerHTML=clocktext;
}

GetClock();
setInterval(GetClock,1000);
</script>

				<!--/.nav-collapse -->
			</div>
</center>
