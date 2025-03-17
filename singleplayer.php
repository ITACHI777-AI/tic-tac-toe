<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single Player Tic-Tac-Toe</title>
    <style>
        body {
            text-align: center;
            font-family: Arial, sans-serif;
        }
        .board {
            display: grid;
            grid-template-columns: repeat(3, 100px);
            grid-template-rows: repeat(3, 100px);
            gap: 5px;
            justify-content: center;
            margin-top: 20px;
        }
        .cell {
            width: 100px;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2em;
            background-color: #f0f0f0;
            cursor: pointer;
            border: 1px solid #000;
        }
        .cell.taken {
            cursor: not-allowed;
        }
        #status {
            margin-top: 20px;
            font-size: 1.5em;
        }
        button {
            margin-top: 10px;
            padding: 10px 20px;
            font-size: 1em;
        }
    </style>
</head>
<body>
    <h1>Tic-Tac-Toe</h1>
    <div class="board" id="board"></div>
    <div id="status">Your Turn!</div>
    <button onclick="resetGame()">Restart Game</button>
    <script>
        const board = document.getElementById("board");
        const status = document.getElementById("status");
        let cells = [];
        let boardState = ["", "", "", "", "", "", "", "", ""];
        let gameOver = false;
        function createBoard() {
            board.innerHTML = "";
            boardState = ["", "", "", "", "", "", "", "", ""];
            gameOver = false;
            status.innerText = "Your Turn!"; 
            for (let i = 0; i < 9; i++) {
                let cell = document.createElement("div");
                cell.classList.add("cell");
                cell.dataset.index = i;
                cell.addEventListener("click", playerMove);
                board.appendChild(cell);
                cells[i] = cell;
            }
        }
        function playerMove(event) {
            if (gameOver) return;
            let index = event.target.dataset.index;
            if (boardState[index] !== "") return;
            boardState[index] = "X";
            cells[index].innerText = "X";
            cells[index].classList.add("taken");
            if (checkWinner("X")) return;
            setTimeout(computerMove, 500);
        }
        function computerMove() {
            if (gameOver) return;
            let emptyCells = boardState.map((val, idx) => val === "" ? idx : null).filter(val => val !== null);
            if (emptyCells.length === 0) return;
            let randomIndex = emptyCells[Math.floor(Math.random() * emptyCells.length)];
            boardState[randomIndex] = "O";
            cells[randomIndex].innerText = "O";
            cells[randomIndex].classList.add("taken");
            checkWinner("O");
        }
        function checkWinner(player) {
            const winningCombos = [
                [0, 1, 2], [3, 4, 5], [6, 7, 8],
                [0, 3, 6], [1, 4, 7], [2, 5, 8],
                [0, 4, 8], [2, 4, 6]
            ];
            for (let combo of winningCombos) {
                const [a, b, c] = combo;
                if (boardState[a] === player && boardState[b] === player && boardState[c] === player) {
                    gameOver = true;
                    status.innerText = player === "X" ? "You Win!" : "Computer Wins!";
                    return true;
                }
            }
            if (!boardState.includes("")) {
                status.innerText = "It's a Draw!";
                gameOver = true;
                return true;
            }
            return false;
        }
        function resetGame() {
            createBoard();
        }
        createBoard();
    </script>
</body>
</html>