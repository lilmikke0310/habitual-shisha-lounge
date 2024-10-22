
const menuItemsContainer = document.getElementById('menu-items');
const menuData = JSON.parse(document.getElementById('menu-items').textContent); // Suponiendo que el contenido del elemento es el JSON

// Buscar el objeto de menú en el array de datos
const menuSection = menuData.find(section => section.id === 'menu');

// Crear elementos HTML para cada ítem del menú
if (menuSection) {
  menuSection.items.forEach(item => {
    const menuItem = document.createElement('div');
    menuItem.classList.add('menu-item');
    menuItem.innerHTML = `
      <h3>${item.name}</h3>
      <p>Precio: ${item.price}</p>
    `;
    menuItemsContainer.appendChild(menuItem);
  });
}