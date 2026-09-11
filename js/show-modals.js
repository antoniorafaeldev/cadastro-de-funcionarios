const editModal = document.getElementById("edit-modal");
const deleteModal = document.getElementById("delete-modal");
const editButtons = document.querySelectorAll(".edit-btn");
const deleteButtons = document.querySelectorAll(".delete-btn");
const cancelButtons = document.querySelectorAll(".cancel-btn");
const editModalButtons = document.querySelectorAll(".submit-edit-btn");
const idInput = document.getElementById("edit-id")
const editNameInput = document.getElementById("name");
const editEmailInput = document.getElementById("email");
const editRoleInput = document.getElementById("role");
const editWageInput = document.getElementById("wage");


editButtons.forEach((button) => {
  const { id, name, email, role, wage } = button.dataset;

  button.addEventListener("click", () => {
    editModal.showModal();
    idInput.value = id
    editNameInput.value = name
    editEmailInput.value = email
    editRoleInput.value = role
    editWageInput.value = wage
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
