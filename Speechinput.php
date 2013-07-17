<html>
<head>
<meta charset="utf-8" />
<style>
	#audio_control {
		width: 100%;
		height: 100%;
	}

	#audio_input {		
		font-size: 2em;
		line-height: 40px;
		padding: 10px 15px;
		border-radius: 10px;
		border: 3px solid orange;
		outline: none;
		position: absolute;
		left: 35%;
		top: 35%;
	}
	
	#audio_play_button {
		font-size: 1.5em;
		border-radius: 20px;
		border: 1px solid #ffaa00;
		background-color: transparent;
		padding: 10px 15px;
		outline: none;
		position: absolute;
		left: 40%;
		top: 44%;
	}

</style>
<script type="text/javascript">

	function onSpeechInputChange( event ){
		//TO DO
	}
	
	function googleTTS_init(){
		
		resize();	
		
		// play
		document.getElementById("audio_play_button").addEventListener('click', audio_play, false);		
	 }
	
	function audio_play(){
		var text_to_speak = document.getElementById('audio_input').value;
		var language_to_speak = "en";

		if( text_to_speak != ""){
			try {
				//audio voice play
				var audio = new Audio();
				audio.src = "getVoice.php?word="+text_to_speak+"&lang="+language_to_speak;
				console.log(audio.src);
				audio.type = "audio/mpeg";
				audio.play();
				
			} catch (e) {
			return alert(e);
			}
		}
		else{
			alert("Please Speak Something!");
		}
	}
	
	function onWindowResize() {
		resize();
	}
	
	function resize(){
		document.getElementById("audio_input").style.width = window.innerWidth * 0.3;
		document.getElementById("audio_play_button").style.width = window.innerWidth * 0.2;
	}
	
	window.addEventListener( 'resize', onWindowResize, false );
			
</script>


</head>
<body onload="googleTTS_init()">
	<div id="audio_control">
		<input id="audio_input" type="text" onwebkitspeechchange="onSpeechInputChange()" x-webkit-speech lang="en" />
		<button id="audio_play_button">Speak</button>
	</div>
</body>
</html>