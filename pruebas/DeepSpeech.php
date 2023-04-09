<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p class="comentario" id="Prueba" ondblclick="javascript:speechS('Prueba');">Mi nombre es Dante Castelán Carpinteyro</p>
    <script>
        function speechS(id) {

            if ('speechSynthesis' in window) with(speechSynthesis) {
                //onClickStop();

                const playEle = document.querySelector('#play' + id);
                const pauseEle = document.querySelector('#pause' + id);
                const stopEle = document.querySelector('#stop' + id);
                let flag = false; //original false

                if (flag == false) {
                    onClickPlay();
                }

                playEle.addEventListener('click', onClickPlay);
                pauseEle.addEventListener('click', onClickPause);
                stopEle.addEventListener('click', onClickStop);

                function onClickPlay() {
                    const algo = document.getElementById(id).innerHTML; //quitar
                    const algoBueno = algo.replace(/(<([^>]+)>)/gi, "");

                    if (!flag) {
                        flag = true;

                        const utterThis = new SpeechSynthesisUtterance()
                        const synth = window.speechSynthesis
                        //preventDefault();
                        utterThis.lang = "en-US";
                        utterThis.text = algoBueno;
                        utterThis.pitch = 1;
                        utterThis.rate = 0.8;
                        utterThis.onend = function() {
                            flag = false;
                            playEle.className = 'fas fa-play-circle text-secondary';
                            //pauseEle.className = 'fas fa-pause-circle text-secondary fa-lg';
                            //stopEle.className = 'fas fa-stop-circle text-secondary fa-lg';
                            cancel(); //este lo agregue para que se callara cuando se reproduce por primera vez
                        };
                        playEle.className = 'fas fa-play-circle text-success';
                        //pauseEle.className = 'fas fa-pause-circle text-secondary fa-lg';
                        //stopEle.className = 'fas fa-stop-circle text-secondary fa-lg';
                        synth.speak(utterThis);
                        //algoBueno = "";
                        //preventDefault();
                        //cancel();


                    }
                    if (paused) {

                        playEle.className = 'fas fa-play-circle text-success';


                        //playEle.className =  'fas fa-play-circle text-primary fa-lg';
                        pauseEle.className = 'fas fa-pause-circle text-secondary';
                        //stopEle.className = 'fas fa-stop-circle text-secondary fa-lg';
                        resume();

                    }
                }

                function onClickPause() {
                    if (speaking && !paused) {


                        playEle.className = 'fas fa-play-circle text-secondary';
                        pauseEle.className = 'fas fa-pause-circle text-info';
                        //stopEle.className = 'fas fa-stop-circle text-secondary fa-lg';
                        pause();
                    }
                }

                function onClickStop() {
                    if (speaking) {
                        flag = false;

                        playEle.className = 'fas fa-play-circle text-secondary';
                        pauseEle.className = 'fas fa-pause-circle text-secondary';
                        //stopEle.className = 'fas fa-stop-circle text-info';
                        cancel();
                    }
                }

            } else {
                alert('Speech synthesis not supported in your device');
            }
        }


        /*
        const textInputField = document.querySelector("#text-input")
        const form = document.querySelector("#form")
        const utterThis = new SpeechSynthesisUtterance()
        const synth = window.speechSynthesis
        let ourText = ""
        
        
        
        const checkBrowserCompatibility = () => {
          "speechSynthesis" in window
            ? console.log("Web Speech API supported!")
            : alert("Web Speech API not supported :-(")
        }
        
        checkBrowserCompatibility()
        
        
        //let event='e';
        
        form.onsubmit = (event) => {
          event.preventDefault();
            utterThis.lang = "en-US";
          ourText = textInputField.value;
            
            
          utterThis.text = ourText;
            utterThis.pitch = 1;
            utterThis.rate = 0.8;
            
            
          synth.speak(utterThis);
         textInputField.value = "";
        }
        */

        /*
        const textInputField = document.querySelector("#text-input")
        //const form = document.querySelector("#form")
        const utterThis = new SpeechSynthesisUtterance()
        const synth = window.speechSynthesis
        let ourText = ""
        
        const checkBrowserCompatibility = () => {
          "speechSynthesis" in window
            ? console.log("Web Speech API supported!")
            : alert("Web Speech API not supported :-(")
        }
        
        checkBrowserCompatibility()
        
        
        onclick = (event) => {
          event.preventDefault();//para escuchar los textos puestos lo quito, cuando agregan manualmente el texto, entonces lo pongo
            utterThis.lang = "en-US";
          ourText = textInputField.value;
            
            
          utterThis.text = ourText;
            utterThis.pitch = 1;
            utterThis.rate = 0.8;
            
            
          synth.speak(utterThis);
          textInputField.value = "";
        }
        
        
        */
    </script>
</body>

</html>