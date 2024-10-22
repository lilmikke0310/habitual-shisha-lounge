let currentIndex = 0;

document.getElementById('next-btn').addEventListener('click', () => {
    const items = document.querySelector('.menu-items');
    const itemCount = document.querySelectorAll('.menu-item').length;
    currentIndex = (currentIndex + 1) % itemCount;
    items.style.transform = `translateX(-${currentIndex * 100}%)`;
});

document.getElementById('prev-btn').addEventListener('click', () => {
    const items = document.querySelector('.menu-items');
    const itemCount = document.querySelectorAll('.menu-item').length;
    currentIndex = (currentIndex - 1 + itemCount) % itemCount;
    items.style.transform = `translateX(-${currentIndex * 100}%)`;
});
