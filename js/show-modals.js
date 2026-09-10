const editModal = document.getElementById("edit-modal");
const deleteModal = document.getElementById("delete-modal");
const editButtons = document.querySelectorAll(".edit-btn");
const deleteButtons = document.querySelectorAll(".delete-btn");
const cancelButtons = document.querySelectorAll(".cancel-btn");

editButtons.forEach((button) => {
  button.addEventListener("click", () => {
    editModal.showModal();
  });
});

deleteButtons.forEach((button) => {
  button.addEventListener("click", () => {
    deleteModal.showModal();
  });
});

cancelButtons.forEach((button) => {
  button.addEventListener("click", (event) => {
    event.preventDefault();

    const modal = button.closest("dialog");
    if (modal) {
      modal.close();
    }
  });
});
