<!DOCTYPE html>
<html>
<head>
	<title>Speech-to-Text with DeepSpeech</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/deepspeech/0.9.3/deepspeech.min.js" integrity="sha512-GtK5INNO7NQXZ77Yv7tyA5iqfj+lPKyHuqu5y47F5c5+5A5oiakPQhtXmtWW7BQRfD5jocWhA3obgzyu0aV+Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
	<h1>Speech-to-Text with DeepSpeech</h1>
	<p>Click the microphone button and start speaking to transcribe your speech into text:</p>
	<button id="record-btn">Start Recording</button>
	<p id="transcription"></p>

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
