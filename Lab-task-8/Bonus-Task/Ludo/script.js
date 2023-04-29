"using strict";
console.log("😉😉");
// selcting elements

const player0Element = document.querySelector(".player--0");
const player1Element = document.querySelector(".player--1");

const score0Elemnt = document.querySelector("#score--0");
const score1Element = document.getElementById("score--1");
const current0Elemnt = document.getElementById("current--0");
const current1Elemnt = document.getElementById("current--1");

const diceElement = document.querySelector(".dice");
const btnNew = document.querySelector(".btn--new");
const btnRoll = document.querySelector(".btn--roll");
const btnHold = document.querySelector(".btn--hold");
//starting Condition

score0Elemnt.textContent = 0;
score1Element.textContent = 0;
diceElement.classList.add("hidden");
let showWinn = document.getElementById("winningscreen");
const swithcPlayer = function () {
    document.getElementById(`current--${activePlayer}`).textContent = 0;
    activePlayer = activePlayer === 0 ? 1 : 0;
    currentScore = 0;
    player0Element.classList.toggle("player--active");
    player1Element.classList.toggle("player--active");
};

//Rolling Dice funtion
let scores = [0, 0];
let currentScore = 0;
let activePlayer = 0,
    playing = true;
btnRoll.addEventListener("click", function () {
    if (playing) {
        //1.Random dice roll
        const myDice = Math.trunc(Math.random() * 6) + 1;
        //2. display dice
        diceElement.classList.remove("hidden");
        diceElement.src = `dice-${myDice}.png`;
        //3. check for 1. If true then
        if (myDice != 1) {
            //add to the current players score
            currentScore += myDice;
            document.getElementById(`current--${activePlayer}`).textContent =
                currentScore;
        } else {
            //switch to next player
            diceElement.src = "dice-funny.png";
            swithcPlayer();
        }
    }
});
const firstPlayer = prompt("Enter first player name: ");
const secondPlayer = prompt("Enter second player name: ");
document.getElementById("name--0").textContent = firstPlayer;
document.getElementById("name--1").textContent = secondPlayer;
btnHold.addEventListener("click", function () {
    if (playing) {
        scores[activePlayer] += currentScore;
        document.getElementById(`score--${activePlayer}`).textContent =
            scores[activePlayer];
        if (scores[activePlayer] >= 100) {
            playing = false;
            document
                .querySelector(`.player--${activePlayer}`)
                .classList.add("player--winner");
            document
                .querySelector(`.player--${activePlayer}`)
                .classList.remove("player--active");

            // showWinn.style.visibility = "visible";
        } else {
            swithcPlayer();
        }
    }
});

btnNew.addEventListener("click", function () {
    score0Elemnt.textContent = 0;
    score1Element.textContent = 0;
    diceElement.classList.add("hidden");
    diceElement.classList.add("hidden");
    scores = [0, 0];
    currentScore = 0;
    playing = true;
    document.getElementById(`current--0`).textContent = 0;
    document.getElementById(`current--1`).textContent = 0;
    document
        .querySelector(`.player--${activePlayer}`)
        .classList.remove("player--winner");
    document
        .querySelector(`.player--${activePlayer}`)
        .classList.toggle("player--active");

    activePlayer = 0;
});
