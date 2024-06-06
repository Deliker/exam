document.addEventListener("DOMContentLoaded", function() {
    const reel1 = document.getElementById("reel1");
    const reel2 = document.getElementById("reel2");
    const reel3 = document.getElementById("reel3");
    const spinButton = document.getElementById("spin-btn");
    const result = document.getElementById("result");
    const balanceElement = document.getElementById("balance");
    const betAmountInput = document.getElementById("bet-amount");

    const symbols = ["🏴‍☠️", "💰", "⚓", "🏝️", "🗺️", "🔱"];

    function getRandomSymbol() {
        return symbols[Math.floor(Math.random() * symbols.length)];
    }

    function spinReels() {
        const balance = parseFloat(balanceElement.textContent);
        const betAmount = parseFloat(betAmountInput.value);

        if (betAmount > balance) {
            alert('Insufficient balance!');
            return;
        }

        balanceElement.textContent = (balance - betAmount).toFixed(2);

        reel1.classList.add("spin");
        reel2.classList.add("spin");
        reel3.classList.add("spin");

        setTimeout(() => {
            reel1.classList.remove("spin");
            reel2.classList.remove("spin");
            reel3.classList.remove("spin");

            reel1.textContent = getRandomSymbol();
            reel2.textContent = getRandomSymbol();
            reel3.textContent = getRandomSymbol();

            if (reel1.textContent === reel2.textContent && reel2.textContent === reel3.textContent) {
                const winAmount = betAmount * 2; // Example win multiplier
                balanceElement.textContent = (parseFloat(balanceElement.textContent) + winAmount).toFixed(2);
                result.textContent = `You win! You won $${winAmount.toFixed(2)}`;
            } else {
                result.textContent = "Try again!";
            }
        }, 1000);
    }

    spinButton.addEventListener("click", spinReels);
});
