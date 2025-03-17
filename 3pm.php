<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webpage</title>
    <style>
        .video-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1; 
        }
        .container {
            display: flex;
            flex-direction: column; 
            justify-content: center;
            align-items: center;
            height: 100vh; 
            text-align: center;
        }
        .rectangle {
            width: 300px;
            height: 150px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 15px;
            border: 2px solid black;
            font-weight: bold;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px; 
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(5px);
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover {
            background-color: rgba(255, 255, 255, 0.5);
        }
        .loading-container {
            width: 80%;
            max-width: 300px;
            background-color: #ddd;
            border-radius: 10px;
            margin-top: 20px;
            display: none;
            overflow: hidden;
        }
        .loading-bar {
            width: 0%;
            height: 10px;
            background: linear-gradient(90deg, #ff0000, #ff7300, #fffa00, #48ff00, #0099ff, #6f00ff);
            border-radius: 10px;
            transition: width 0.1s ease-in-out;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="rectangle">
            Welcome<br>
            Enter to 3 Player Mode!
        </div>
        <button onclick="startLoading()">Enter</button>
        <div class="loading-container">
            <div class="loading-bar" id="loadingBar"></div>
        </div>
    </div>
    <video autoplay muted loop class="video-bg">
        <source src="v3.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <audio id="enterSound">
        <source src="enter.mp3" type="audio/mp3">
    </audio>
    <script>
        window.addEventListener('DOMContentLoaded', (event) => {
            let audio = new Audio('welcome2.mp3');
            audio.play();
        });
        function startLoading() {
            let loadingContainer = document.querySelector('.loading-container');
            let loadingBar = document.getElementById('loadingBar');
            let enterSound = document.getElementById("enterSound");

            loadingContainer.style.display = "block"; 
            let width = 0;
            let interval = setInterval(function () {
                if (width >= 100) {
                    clearInterval(interval);
                    window.location.href = "3player.php"; 
                } else {
                    width += 3; 
                    loadingBar.style.width = width + "%";
                }
            }, 100); 
            enterSound.play().catch(error => {
                console.log("Audio playback blocked: ", error);
            });
        }
    </script>
</body>
</html>