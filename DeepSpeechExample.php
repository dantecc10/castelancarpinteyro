<!DOCTYPE html>
<html>
<head>
	<title>Speech-to-Text with DeepSpeech</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Include Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<!-- Include jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- Include Popper.js -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<!-- Include Bootstrap JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<!-- Include DeepSpeech JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/deepspeech/0.9.3/deepspeech.min.js" integrity="sha512-GtK5INNO7NQXZ77Yv7tyA5iqfj+lPKyHuqu5y47F5c5+5A5oiakPQhtXmtWW7BQRfD5jocWhA3obgzyu0aV+Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<style>
		.container {
			margin-top: 50px;
		}
		#transcription {
			margin-top: 20px;
			font-size: 24px;
			font-weight: bold;
			text-align: center;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1 class="text-center">Speech-to-Text with DeepSpeech</h1>
		<p class="text-center">Click the microphone button and start speaking to transcribe your speech into text:</p>
		<div class="text-center">
			<button id="record-btn" class="btn btn-primary">Start Recording</button>
		</div>
		<p id="transcription"></p>
	</div>

	<script>
		const modelPath = 'https://github.com/mozilla/DeepSpeech/releases/download/v0.9.3/deepspeech-0.9.3-models.pbmm';
		const scorerPath = 'https://github.com/mozilla/DeepSpeech/releases/download/v0.9.3/deepspeech-0.9.3-models.scorer';

		const model = new DeepSpeech.Model(modelPath);
		model.enableExternalScorer(scorerPath);

		const recordBtn = document.querySelector('#record-btn');
		const transcription = document.querySelector('#transcription');

		const mediaStreamConstraints = { audio: true };

		const mediaStream = navigator.mediaDevices.getUserMedia(mediaStreamConstraints);

		const mediaRecorder = new MediaRecorder(mediaStream);

		let chunks = [];

		recordBtn.addEventListener('click', () => {
			if (mediaRecorder.state === 'inactive') {
				mediaRecorder.start();
				recordBtn.textContent = 'Stop Recording';
				recordBtn.classList.remove('btn-primary');
				recordBtn.classList.add('btn-danger');
			} else {
				mediaRecorder.stop();
				recordBtn.textContent = 'Start Recording';
				recordBtn.classList.remove('btn-danger');
				recordBtn.classList.add('btn-primary');
			}
		});

		mediaRecorder.addEventListener('dataavailable', (event) => {
			chunks.push(event.data);
		});

		mediaRecorder.addEventListener('stop', async () => {
		
