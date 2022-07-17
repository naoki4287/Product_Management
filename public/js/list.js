"use strict";

const cancel = document.getElementById("cancel");
const delModalOpen = document.getElementById("delModalOpen");
const deleteModal = document.getElementById("deleteModal");
const checkbox = document.getElementsByClassName("checkbox");

delModalOpen.addEventListener("click", () => {
    deleteModal.classList.remove("hidden");
});

cancel.addEventListener("click", () => {
    deleteModal.classList.add("hidden");
});
