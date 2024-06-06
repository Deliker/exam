document.addEventListener('DOMContentLoaded', () => {
    console.log('Slots JS loaded');

    const slotData = [
        { name: 'Fairies & Dragons', url: '/slot-fairies-dragons', icon: 'fairies-dragons-icon.png' },
        { name: 'Pirates & Treasures', url: '/slot-pirates-treasures', icon: 'pirates-treasures-icon.png' },
        { name: 'Mythical Creatures', url: '/slot-mythical-creatures', icon: 'mythical-creatures-icon.png' },
        { name: 'Magical Tales', url: '/slot-magical-tales', icon: 'magical-tales-icon.png' },
        { name: 'Mystic Adventure', url: '/slot-mystic-adventure', icon: 'mystic-adventure-icon.png' },
        { name: 'Mystic Adventures', url: '/slot-mystic-adventures', icon: 'mystic-adventures-icon.png' }
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
