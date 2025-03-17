<html>
<head>
<title>Tic Tac Toe</title>
<style>
body {
font-family: Arial, sans-serif;
display: flex;
justify-content: center;
align-items: center;
height: 100vh;
margin: 0;
background-color: #f0f0f0;
}
.container {
display: grid;
grid-template-columns: repeat(3, 100px);
grid-gap: 5px;
}
.cell {
width: 100px;
height: 100px;
display: flex;
justify-content: center;
align-items: center;
font-size: 24px;
font-weight: bold;
background-color: white;
border: 2px solid #000;
cursor: pointer;
}
.cell.taken {
 pointer-events: none;
}
.winner {
margin-top: 20px;
font-size: 20px;
color: green;
}
button {
margin-top: 10px;
padding: 10px 20px;
font-size: 16px;
cursor: pointer;
}
</style>
</head>
<body>
<div>
<div class="container" id="board"></div>
<div class="winner" id="winner"></div>
<button onclick="resetGame()">Restart Game</button>
</div>
<script>
const board = document.getElementById('board');
const winnerDiv = document.getElementById('winner');
let currentPlayer = 'X';
let gameActive = true;
let gameState = ["", "", "", "", "", "", "", "", ""];
const winningConditions = [
[0, 1, 2], [3, 4, 5], [6, 7, 8], 
[0, 3, 6], [1, 4, 7], [2, 5, 8], 
[0, 4, 8], [2, 4, 6]            
];
function handleCellClick(event) {
const cell = event.target;
const cellIndex = parseInt(cell.getAttribute('data-index'));
if (gameState[cellIndex] !== "" || !gameActive) {
return;
}
gameState[cellIndex] = currentPlayer;
cell.textContent = currentPlayer;
cell.classList.add('taken');
checkWinner();
currentPlayer = currentPlayer === 'X' ? 'O' : 'X';
}
function checkWinner() {
for (let condition of winningConditions) {
const [a, b, c] = condition;
if (gameState[a] && gameState[a] === gameState[b] && gameState[a] === gameState[c]) {
gameActive = false;
winnerDiv.textContent = `Player ${gameState[a]} Wins!`;
return;
}
}
if (!gameState.includes("")) {
gameActive = false;
winnerDiv.textContent = "It's a Draw!";
}
}
function resetGame() {
gameActive = true;
currentPlayer = 'X';
gameState = ["", "", "", "", "", "", "", "", ""];
winnerDiv.textContent = "";
while (board.firstChild) {
board.removeChild(board.firstChild);
}
initializeBoard();
}
function initializeBoard() {
for (let i = 0; i < 9; i++) {
const cell = document.createElement('div');
cell.classList.add('cell');
cell.setAttribute('data-index', i);
cell.addEventListener('click', handleCellClick);
board.appendChild(cell);
}
}
initializeBoard();
</script>
</body>
</html>
