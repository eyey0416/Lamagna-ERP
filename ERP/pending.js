document.addEventListener("DOMContentLoaded", function() {
    const pendingItemsContainer = document.getElementById("pending-items");
    const addBtn = document.getElementById("add-btn");
    const newItemText = document.getElementById("new-item-text");

    addBtn.addEventListener("click", function() {
        const text = newItemText.value.trim();
        if (text !== "") {
            // Create a list item
            const newItem = document.createElement("li");
            newItem.textContent = text;
            newItem.classList.add("pending-item"); // Add class for styling

            // Create a button for removing the item
            const removeBtn = document.createElement("button");
            removeBtn.textContent = "Remove";
            removeBtn.classList.add("remove-btn");
            removeBtn.addEventListener("click", function() {
                pendingItemsContainer.removeChild(newItem);
            });

            // Append the item and the button to the container
            pendingItemsContainer.appendChild(newItem);
            newItem.appendChild(removeBtn);

            // Clear the input field
            newItemText.value = "";
        }
    });
});
