document.addEventListener("DOMContentLoaded", function() {
    const pendingItemsContainer = document.getElementById("pending-items");
    const addBtn = document.getElementById("add-btn");
    const newItemText = document.getElementById("new-item-text");

    // Function to load pending items from local storage
    function loadPendingItems() {
        const pendingItems = JSON.parse(localStorage.getItem("pendingItems")) || [];
        pendingItems.forEach(item => {
            // Create a list item
            const newItem = document.createElement("li");
            newItem.textContent = item.text;
            newItem.classList.add("pending-item"); // Add class for styling

            // Create a button for removing the item
            const removeBtn = document.createElement("button");
            removeBtn.textContent = "Remove";
            removeBtn.classList.add("remove-btn");
            removeBtn.addEventListener("click", function() {
                removePendingItem(item.id);
                pendingItemsContainer.removeChild(newItem); // Remove the item from the DOM
            });

            // Append the item and the button to the container
            pendingItemsContainer.appendChild(newItem);
            newItem.appendChild(removeBtn);
        });
    }

    // Function to save pending items to local storage
    function savePendingItems(items) {
        localStorage.setItem("pendingItems", JSON.stringify(items));
    }

    // Function to add a new pending item
    function addPendingItem(text) {
        const newItem = { id: Date.now(), text: text };
        const pendingItems = JSON.parse(localStorage.getItem("pendingItems")) || [];
        pendingItems.push(newItem);
        savePendingItems(pendingItems);
        return newItem;
    }

    // Function to remove a pending item
    function removePendingItem(id) {
        let pendingItems = JSON.parse(localStorage.getItem("pendingItems")) || [];
        pendingItems = pendingItems.filter(item => item.id !== id);
        savePendingItems(pendingItems);
    }

    // Load pending items when the page loads
    loadPendingItems();

    // Add event listener for adding new items
    addBtn.addEventListener("click", function() {
        const text = newItemText.value.trim();
        if (text !== "") {
            const newItem = addPendingItem(text);

            // Create a list item
            const listItem = document.createElement("li");
            listItem.textContent = text;
            listItem.classList.add("pending-item"); // Add class for styling

            // Create a button for removing the item
            const removeBtn = document.createElement("button");
            removeBtn.textContent = "Remove";
            removeBtn.classList.add("remove-btn");
            removeBtn.addEventListener("click", function() {
                removePendingItem(newItem.id);
                pendingItemsContainer.removeChild(listItem); // Remove the item from the DOM
            });

            // Append the item and the button to the container
            pendingItemsContainer.appendChild(listItem);
            listItem.appendChild(removeBtn);

            // Clear the input field
            newItemText.value = "";
        }
    });
});
