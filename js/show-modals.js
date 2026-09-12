const editModal = document.getElementById("edit-modal");
const deleteModal = document.getElementById("delete-modal");
const editButtons = document.querySelectorAll(".edit-btn");
const deleteButtons = document.querySelectorAll(".delete-btn");
const cancelButtons = document.querySelectorAll(".cancel-btn");
const editIdInput = document.getElementById("edit-id");
const deleteIdInput = document.getElementById("delete-id");
const editNameInput = document.getElementById("name");
const editEmailInput = document.getElementById("email");
const editRoleInput = document.getElementById("role");
const editWageInput = document.getElementById("wage");

editButtons.forEach((button) => {
  const { id, name, email, role, wage } = button.dataset;

  button.addEventListener("click", () => {
    editModal.showModal();
    editIdInput.value = id;
    editNameInput.value = name;
    editEmailInput.value = email;
    editRoleInput.value = role;
    editWageInput.value = wage;
  });
});

deleteButtons.forEach((button) => {
  button.addEventListener("click", () => {
    const id = button.dataset.id;

    deleteModal.showModal();
    deleteIdInput.value = id
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
