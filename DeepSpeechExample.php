<!DOCTYPE html>
<html>
<head>
	<title>Speech-to-Text with DeepSpeech</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.2/css/bootstrap.min.css" integrity="sha512-ZbrcTnU6mIAb6CAXUE6v7GZCqb8sIgj6FlvcBv64j9W/o8yY/Y7VHuJzvwEj7fhWwzZ+n0FFMhDzZ1nwdr9QKQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/deepspeech/0.9.3/deepspeech.min.js" integrity="sha512-GtK5INNO7NQXZ77Yv7tyA5iqfj+lPKyHuqu5y47F5c5+5A5oiakPQhtXmtWW7BQRfD5jocWhA3obgzyu0aV+Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
	<div class="container">
		<h1 class="mt-3 mb-5">Speech-to-Text with DeepSpeech</h1>
		<div class="row">
			<div class="col-md-6">
				<p>Click the microphone button and start speaking to transcribe your speech into text:</p>
			</div>
			<div class="col-md-6 d-flex justify-content-end">
				<button id="record-btn" class="btn btn-primary">Start Recording</button>
			</div>
		</div>
		<div class="mt-5">
			<p id="transcription"></p>
		</div>
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
			} else {
				mediaRecorder.stop();
				recordBtn.textContent = 'Start Recording';
			}
		});

		mediaRecorder.addEventListener('dataavailable', (event) => {
			chunks.push(event.data);
		});

		mediaRecorder.addEventListener('stop', async () => {
			const blob = new Blob(chunks, { type: 'audio/wav' });
			const fileReader = new FileReader();
			fileReader.readAsArrayBuffer(blob);
			fileReader.onloadend = async () => {
				const audioBuffer = await new AudioContext().decodeAudioData(fileReader.result);
				const inputData = new Float32Array(audioBuffer.getChannelData(0));
				const result = model.stt(inputData);
				transcription.textContent = result;
			};
			chunks = [];
		});
	</script>
</body>
</html>