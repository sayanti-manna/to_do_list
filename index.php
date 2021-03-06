<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width-device-width, initial-scale=1">
	<title>To do list by using JavaScript</title>

	 <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<style type="text/css">
		body{
			background-color:#ffffcc;
		}
		.to-do{
			text-align: center;
			font-size: 25px;
			font-weight: bolder;
			margin-bottom:10px;
     		text-shadow: 0 0 3px #FF0000, 0 0 5px #0000FF;
		}
		table{
			padding-right:0px;
			border-radius: 20px;
			box-shadow: 0 0 10px gray;
			margin-top: 60px;
		}	
		.addtext{
			width: 100%;
			display: flex;
			padding: 10px 0;
			margin-left:0px;
		}

		.addtext > input[type="text"]{
			width: 90%;
			color: #333;
			border:none;
			border-bottom: 2px solid #666;
			background: none;
			padding: 2px;
			font-size: 22px;
			outline: none;
		}
		.addtext button{
			margin: 0 10px;
			background: #000;
			color: #fff;
			font-size: 30px;
			padding-left:10px;
			padding-right:10px;
			border: none;
			outline: none;
			border-radius: 5px;
			cursor: pointer;
		}
		
		ol{
			list-style: none;
			counter-reset: next-counter;
			padding-right:40px;
		}
		ol li{
			width: 100%;
			counter-increment: next-counter;
			background-color: #ff3300;
			padding-bottom:5px;
			padding-top:5px;
			margin-bottom: 2px;
			border-radius: 20px;
		}

		ol.complete li{
			background-color:  #00e600;
		}

		ol li::before{
			content: counter(next-counter);
			background: #231381;
			width: 20px;
			height: 20px;  
			display: inline-block;
			text-align: center;
			color: #fff;
			margin-right: 0.5rem;
			border-radius: 50%;
			margin-left:5px;
		}
		li button{
			float: right;
			font-size: 20px;
			background: none;
			border: none;
			outline: none;
			cursor: pointer;
			margin-top: -2px;  
		}

		.footer{
			margin-top:30px;
			text-align: center;
			letter-spacing: 2px;
		}

	</style>

</head>
<body>
		<p class="to-do">TO DO LIST</p>

	<table align="center" style="border:2px solid black;">
		<tr style="">
			<td background = "background2.jpg"style="height:220px; background-size:cover; box-shadow: 0 0 15px gray;  border-top-left-radius:20px;   border-top-right-radius:20px; color:#fff;font-size: 20px;">
  				<div id = "showtime" style="font-weight:bold;text-align:center;/*margin-top:-70px;padding-bottom: 70px; padding-right:20px;*/padding-bottom:10px;"></div>
  				<div id = "showdate" style="font-weight:bold;text-align: center;"></div>
			
			</td>
		</tr>
		<tr>
			<td>
				<div class="addtext">
					<input type="text" placeholder="Enter a task">
					<button><i class="fa fa-plus-circle"></i></button>
				</div>
			</td>
		</tr>

		<tr>
			<td>
				<p align="center" style="font-weight: bold; font-size:20px;">YOUR TASK</p>	
				<ol class="yourtask">
				</ol>
			</td>
		</tr>
		<tr>
			<td>
				<p align="center" style="font-weight: bold; font-size:20px;">COMPLETED</p>
				<ol class="complete">
				</ol>
			</td>
		</tr>
	</table>
<p class="footer">( Designed by <i> @SAYANTI MANNA )</i></p>


	<script type="text/javascript">
		const input = document.querySelector('input');
		const btn = document.querySelector('.addtext > button');

		btn.addEventListener('click' , tasklist);
		input.addEventListener('keyup', (task)=>{
			(task.keyCode === 13 ? tasklist(task) : null);
		})

		function tasklist(task){
			const yourtask = document.querySelector('.yourtask');
			const complete = document.querySelector('.complete');

			const newtask = document.createElement('li');
			const checkbtn = document.createElement('button');
			const delbtn = document.createElement('button');

			checkbtn.innerHTML = '<i class="fa fa-check"></i>';
			delbtn.innerHTML = '<i class="fa fa-trash"></i>';

			if(input.value !== ''){
				newtask.textContent = input.value;
				input.value = '';
				yourtask.appendChild(newtask);
				newtask.appendChild(checkbtn);
				newtask.appendChild(delbtn);
			}

			checkbtn.addEventListener('click', function(){
				const parent = this.parentNode;
				parent.remove();
				complete.appendChild(parent);
				checkbtn.style.display = 'none';
			});

			delbtn.addEventListener('click', function(){
				const parent = this.parentNode;
				parent.remove();
			});
		}


		var realdate = new Date();

		// date setting.......

		var day = realdate.getUTCDay();
		var date = realdate.getUTCDate();
		var month = realdate.getUTCMonth();
		var year = realdate.getUTCFullYear();

		// Universal Coordinated Time(UTC) is the time set by the world time standard.....

		var days = ["Sunday ","Monday ","Tuesday ","Wednesday ","Thursday ","Friday ","Saturday "];
		var months = ["Jan ", "Feb ", "Mar ", "Apr ", "May ", "Jun ", "Jul ", "Aug ", "Sep ", "Oct ", "Nov ", "Dec "];
		document.getElementById("showdate").innerHTML = (days[day] + ", " + months[month] + date  + ", " + year);

	
		// time setting.......

		var autosec = setInterval(clock,1000);
		function clock()
		{
			var realdate = new Date();
			var time = realdate.toLocaleTimeString();
			document.getElementById("showtime").innerHTML = (time);
		}
	</script>

</body>
</html>
