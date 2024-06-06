document.addEventListener('DOMContentLoaded', function() {
    const symbols = ['🍒', '🍋', '🍊', '🍉', '🔔', '⭐', '🍇', '🍓', '🍍'];
    const reels = [
        document.getElementById('reel1'),
        document.getElementById('reel2'),
        document.getElementById('reel3')
    ];
    const resultMessage = document.getElementById('resultMessage');
    const spinButton = document.getElementById('spinButton');
    const balanceElement = document.getElementById('balance');
    const betAmountElement = document.getElementById('betAmount');
    let balance = parseFloat(balanceElement.textContent);

    function spin() {
        const betAmount = parseFloat(betAmountElement.value);

        if (betAmount > balance) {
            resultMessage.textContent = 'Insufficient balance!';
            resultMessage.style.color = 'red';
            return;
        }

        balance -= betAmount;
        balanceElement.textContent = balance.toFixed(2);

        spinButton.disabled = true; // Блокируем кнопку

        const spinDuration = 2000; // Длительность прокрутки в миллисекундах
        const intervalTime = 100;  // Интервал времени для смены символов

        reels.forEach(reel => {
            const shuffledSymbols = shuffleArray(symbols.slice());
            animateReel(reel, shuffledSymbols, spinDuration, intervalTime);
        });

        setTimeout(() => {
            const resultSymbols = reels.map(reel => reel.children[1].textContent);
            const winAmount = calculateWin(resultSymbols, betAmount);
            balance += winAmount;

            // Отправка данных на сервер для обновления баланса
            fetch('/spin', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    betAmount: betAmount,
                    winAmount: winAmount,
                    slotName: 'Mystic Adventure'
                })
            })
            .then(response => response.json())
            .then(data => {
                balance = data.balance;
                balanceElement.textContent = balance.toFixed(2);
                spinButton.disabled = false; // Разблокируем кнопку
            })
            .catch(error => {
                console.error('Error:', error);
                spinButton.disabled = false; // Разблокируем кнопку в случае ошибки
            });

            displayResult(resultSymbols, winAmount);
        }, spinDuration);
    }

    function shuffleArray(array) {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
        return array;
    }

    function animateReel(reel, symbols, duration, intervalTime) {
        reel.innerHTML = '';
        const fragment = document.createDocumentFragment();
        symbols.forEach(symbol => {
            const symbolDiv = document.createElement('div');
            symbolDiv.className = 'symbol';
            symbolDiv.textContent = symbol;
            fragment.appendChild(symbolDiv);
        });
        reel.appendChild(fragment);

        let interval = setInterval(() => {
            const firstSymbol = reel.children[0];
            reel.appendChild(firstSymbol.cloneNode(true));
            reel.removeChild(firstSymbol);
        }, intervalTime);

        setTimeout(() => {
            clearInterval(interval);
        }, duration);
    }

    function calculateWin(symbols, betAmount) {
        const [symbol1, symbol2, symbol3] = symbols;
        if (symbol1 === symbol2 && symbol2 === symbol3) {
            return betAmount * 10; // Выигрыш в 10 раз больше ставки
        }
        return 0;
    }

    function displayResult(symbols, winAmount) {
        if (winAmount > 0) {
            resultMessage.textContent = `You win $${winAmount.toFixed(2)}!`;
            resultMessage.style.color = 'green';
        } else {
            resultMessage.textContent = 'You lose!';
            resultMessage.style.color = 'red';
        }
    }

    spinButton.addEventListener('click', spin);
});
