<!DOCTYPE html>
<html>
<head>
    <title>Webpage</title>
    <style>
        .img-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            object-fit: cover;
            z-index: -1; 
        }
        .rectangle {
            border: 2px solid black;
            width: 300px;
            height: 500px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            margin: auto;
            background: rgba(255, 255, 255, 0.2); 
            backdrop-filter: blur(10px); 
            border-radius: 10px; 
            padding: 20px;
            position: relative;
        }
        .rectangle button {
            margin: 10px;
            padding: 10px;
            font-size: 16px;
            cursor: pointer;
        }
        .loading-container {
            width: 80%;
            background-color: #ddd;
            border-radius: 10px;
            margin-top: 20px;
            display: none;
            overflow: hidden;
            position: absolute;
            bottom: 20px;
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
    <img src="tttvideo.webp" class="img-bg" alt="Background Image">
    <div class="rectangle">
        <h3>Welcome to TIC TAC TOE game</h3>
        <p>Select Modes</p>
        <button onclick="startLoading('singleplayer.php')">1 Player Mode</button>
        <button onclick="startLoading('welcome.php')">Multiplayer Mode</button>
        <button onclick="startLoading('3pm.php')">3 Player Mode</button>
        <div class="loading-container">
            <div class="loading-bar" id="loadingBar"></div>
        </div>
    </div>
    <audio id="audio1">
        <source src="studio.mp3" type="audio/mpeg">
    </audio>
    <audio id="audio2">
        <source src="kai.mp3" type="audio/mpeg">
    </audio>
    <script>
        const audio1 = document.getElementById("audio1");
        const audio2 = document.getElementById("audio2");

        window.onload = function () {
            audio1.play();
        };

        audio1.addEventListener("ended", function () {
            audio2.play();
        });
        function startLoading(page) {
            let loadingContainer = document.querySelector('.loading-container');
            let loadingBar = document.getElementById('loadingBar');
            loadingContainer.style.display = "block"; 
            let width = 0;
            let interval = setInterval(function () {
                if (width >= 100) {
                    clearInterval(interval);
                    location.href = page; 
                } else {
                    width += 1; 
                    loadingBar.style.width = width + "%";
                }
            }, 100); 
        }
    </script>
</body>
</html>