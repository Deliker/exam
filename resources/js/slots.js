document.addEventListener('DOMContentLoaded', () => {
    console.log('Slot JS loaded');

    const reels = document.querySelectorAll('.reel');
    const spinBtn = document.querySelector('.spin-btn');
    let resultContainer = document.querySelector('#result');

    // Если контейнер для результата не существует, создаем его
    if (!resultContainer) {
        resultContainer = document.createElement('div');
        resultContainer.id = 'result';
        resultContainer.className = 'result';
        spinBtn.insertAdjacentElement('afterend', resultContainer);
    }

    const balanceElement = document.querySelector('#balance');
    const betAmountInput = document.querySelector('#bet-amount');

    const symbolsMap = {
        'slot-fairies-dragons.html': ['🧚‍♀️', '🐉', '🦄', '🍄', '🌟', '🌈', '💎', '🔮'],
        'slot-pirates-treasures.html': ['🏴‍☠️', '💰', '⚓', '🏝️', '🗺️', '🔱'],
        'slot-mythical-creatures.html': ['🦄', '🐉', '🧚‍♀️', '🦅'],
        'slot-magical-tales.html': ['📖', '🧙‍♂️', '🧝‍♀️', '🦄', '🌟', '🔮'],
        'slot-mystic-adventure.html': ['🍒', '🍋', '🔔', '⭐', '💎', '7️⃣']
    };

    const currentPage = window.location.pathname.split('/').pop();
    const symbols = symbolsMap[currentPage] || symbolsMap['slot-fairies-dragons.html'];

    function spin() {
        const balance = parseFloat(balanceElement.textContent);
        const betAmount = parseFloat(betAmountInput.value);

        if (betAmount > balance) {
            alert('Insufficient balance!');
            return;
        }

        balanceElement.textContent = (balance - betAmount).toFixed(2);
        spinBtn.disabled = true;
        resultContainer.innerText = '';
        resultContainer.classList.remove('fade-in');
        let results = [];
        reels.forEach((reel, index) => {
            const symbolsHTML = symbols.map(symbol => `<div class="symbol">${symbol}</div>`).join('');
            reel.innerHTML = symbolsHTML.repeat(3);
            const randomIndex = Math.floor(Math.random() * symbols.length);

            const scrollLeft = (randomIndex + symbols.length) * 100;
            setTimeout(() => {
                reel.scrollTo({
                    left: scrollLeft,
                    behavior: 'smooth'
                });
            }, index * 100);

            results.push(symbols[randomIndex]);
        });
        setTimeout(() => {
            checkWin(results, betAmount);
            spinBtn.disabled = false;
        }, reels.length * 100 + 500);
    }

    function checkWin(results, betAmount) {
        const counts = results.reduce((acc, symbol) => {
            acc[symbol] = (acc[symbol] || 0) + 1;
            return acc;
        }, {});

        const maxCount = Math.max(...Object.values(counts));
        if (maxCount > 1) {
            const winAmount = betAmount * 2; // Example win multiplier
            showResult(`You won! Matched ${maxCount} symbols: ${Object.keys(counts).find(symbol => counts[symbol] === maxCount)}`, winAmount);
        } else {
            showResult('Try again!', 0);
        }
    }

    function showResult(message, winAmount) {
        const balance = parseFloat(balanceElement.textContent);
        balanceElement.textContent = (balance + winAmount).toFixed(2);
        resultContainer.innerText = message;
        resultContainer.classList.add('fade-in');
    }

    if (spinBtn) {
        spinBtn.addEventListener('click', spin);
    }

    window.spin = spin;
});

document.addEventListener('DOMContentLoaded', () => {
    console.log('Slots JS loaded');

    const slotData = [
        { name: 'Fairies & Dragons', url: 'slot-fairies-dragons.html', icon: 'fairies-dragons-icon.png' },
        { name: 'Pirates & Treasures', url: 'slot-pirates-treasures.html', icon: 'pirates-treasures-icon.png' },
        { name: 'Mythical Creatures', url: 'slot-mythical-creatures.html', icon: 'mythical-creatures-icon.png' },
        { name: 'Magical Tales', url: 'slot-magical-tales.html', icon: 'magical-tales-icon.png' },
        { name: 'Mystic Adventure', url: 'slot-mystic-adventure.html', icon: 'mystic-adventure-icon.png' }
    ];

    const slotList = document.getElementById('slot-list');
    const searchInput = document.getElementById('search');

    function displaySlots(slots) {
        slotList.innerHTML = '';
        slots.forEach(slot => {
            const slotLink = document.createElement('a');
            slotLink.href = slot.url;
            slotLink.className = 'slot-link fade-in';
            slotLink.innerHTML = `
                <img src="images/${slot.icon}" alt="${slot.name}">
                <span>${slot.name}</span>
            `;
            slotList.appendChild(slotLink);
        });
    }

    function searchSlots() {
        const query = searchInput.value.toLowerCase();
        const filteredSlots = slotData.filter(slot => slot.name.toLowerCase().includes(query));
        displaySlots(filteredSlots);
    }

    displaySlots(slotData);
    searchInput.addEventListener('input', searchSlots);
});
