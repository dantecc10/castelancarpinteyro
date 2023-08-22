<html>

<head></head>

<body>
<style>
    css

.racoon {
  position: relative;
  width: 200px;
  height: 200px;
  background-color: #f2c94c;
  animation: racoon-move 2s infinite;

}


.racoon.head {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 100px;
  height: 100px;
  background-color: #f2c94c;
  border-radius: 50%;
  animation: racoon-head 2s infinite;

}


.racoon.head.ear {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 30px;
  height: 10px;
  background-color: #f2c94c;
  border-radius: 50%;
  animation: racoon-ear 2s infinite;

}


.racoon.head.ear:nth-child(1) {
  animation-delay: 0.2s;

}


.racoon.head.ear:nth-child(2) {
  animation-delay: 0.4s;

}


.racoon.head.body {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 60px;
  height: 60px;
  background-color: #f2c94c;
  border-radius: 50%;
  animation: racoon-body 2s infinite;

}


.racoon.head.tail {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 20px;
  height: 20px;
  background-color: #f2c94c;
  border-radius: 50%;
  animation: racoon-tail 2s infinite;

}


.racoon.body {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 80px;
  height: 80px;
  background-color: #f2c94c;
  border-radius: 50%;
  animation: racoon-body 2s infinite;

}


.racoon.leg {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 50px;
  height: 50px;
  background-color: #f2c94c;
  border-radius: 50%;
  animation: racoon-leg 2s infinite;

}


.racoon.leg:nth-child(1) {
  animation-delay: 0.2s;

}


.racoon.leg:nth-child(2) {
  animation-delay: 0.4s;

}


@keyframes racoon-move {
  0% {
    transform: translate(0, 0);
  }
  50% {
    transform: translate(50px, 50px);
  }
  100% {
    transform: translate(0, 0);
  }

}


@keyframes racoon-head {
  0% {
    transform: translate(-50%, -50%) rotate(0deg);
  }
  50% {
    transform: translate(-50%, -50%) rotate(360deg);
  }
  100% {
    transform: translate(-50%, -50%) rotate(0deg);
  }

}

</style>

    <div class="racoon">
        <div class="head">
            <div class="ear"></div>
            <div class="ear"></div>
            <div class="body"></div>
            <div class="tail"></div>
        </div>
        <div class="body"></div>
        <div class="leg"></div>
        <div class="leg"></div>

    </div>
</body>

</html>