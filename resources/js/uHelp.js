// Ticket view reply form panel toggle
const replyBtn = document.querySelector(".panel .panel-title");
const replyPannel = document.querySelector(".panel .panel-collapse");

if (replyBtn && replyPannel) {
    replyBtn.addEventListener("click", () => {
        replyBtn.classList.toggle("collapsed");
        replyPannel.classList.toggle("show");
    });
}

// Delete ticket/collection modal
const deleteModal = document.querySelector(".delete-modal-overlay");
const deleteCancel = document.querySelector(".delete-modal-btn.cancel");
const deleteTicket = document.querySelectorAll(
    ".table-format:not(.categories-table) .action-delete"
);
const deleteTicketSpan = document.querySelector(".quick-delete-ticket");
const deleteCategory = document.querySelectorAll(
    ".categories-table .action-delete"
);
if (deleteModal && deleteCancel) {
    if (deleteTicket.length > 0) {
        setupDeleteButtons(deleteTicket, true);
    }

    if (deleteCategory.length > 0) {
        setupDeleteButtons(deleteCategory, false);
    }

    document.addEventListener("click", (e) => {
        if (
            e.target === deleteModal ||
            e.target === deleteCancel ||
            e.target === deleteTicketSpan
        ) {
            deleteModal.classList.remove("show");
        }
    });

    deleteCancel.addEventListener("click", () =>
        deleteModal.classList.remove("show")
    );

    if (deleteTicketSpan) {
        deleteTicketSpan.addEventListener("click", (e) => {
            deleteModal.classList.toggle("show");
            e.stopPropagation();
        });
    }
}
function setupDeleteButtons(buttons, isCategory = true) {
    buttons.forEach((btn) => {
        btn.addEventListener("click", (e) => {
            deleteModal.classList.toggle("show");
            e.stopPropagation();
            updateFormId(
                document.querySelector(".delete-modal form"),
                btn,
                isCategory
            );
        });
    });
}

// Admin category page edit modal
const editCatModal = document.querySelector(".edit-category-overlay");
const editCats = document.querySelectorAll(".categories-table .action-view");

if (editCatModal && editCats.length > 0) {
    const editCatCancel = editCatModal.querySelector(".close");
    const form = editCatModal.querySelector("form");
    const nameInput = editCatModal.querySelector("#name");
    const statusInput = editCatModal.querySelector("#status");

    editCats.forEach((btn) => {
        btn.addEventListener("click", (e) => {
            toggleModal(e, btn, nameInput, statusInput, form);
        });
    });

    document.addEventListener("click", (e) => {
        if (
            e.target === editCatModal ||
            e.target === editCatCancel ||
            editCatCancel.contains(e.target)
        ) {
            editCatModal.classList.remove("show");
        }
    });
}

function toggleModal(event, button, nameInput, statusInput, form) {
    event.stopPropagation();
    populateFormData(button, nameInput, statusInput, form);
    editCatModal.classList.toggle("show");
}

function populateFormData(button, nameInput, statusInput, form) {
    const tRow = button.closest("tr");
    const id = tRow?.querySelector("[data-category-id]")?.dataset.categoryId;
    const status = tRow?.querySelector("[data-category-status]")?.dataset
        .categoryStatus;

    nameInput.value = tRow
        .querySelector("[data-category-id]")
        .textContent.trim()
        .toLowerCase();
    statusInput.checked = +status;

    if (form && id) {
        updateFormAction(id, form);
    }
}

function updateFormAction(id, form) {
    const formUrl = form.getAttribute("action");
    form.setAttribute("action", formUrl.replace(/(\d+)(?!.*\d)/, id));
}

// Admin ticket view page category/priority edit modal
function setupModalInteraction(modalSelector, buttonSelector) {
    const modal = document.querySelector(modalSelector);
    if (!modal) return;
    const modalCancel = modal.querySelector(".close");
    if (!modalCancel) return;
    const editButton = document.querySelector(buttonSelector);
    if (!editButton) return;

    if (modal && modalCancel && editButton) {
        document.addEventListener("click", (e) => {
            if (e.target === editButton || editButton.contains(e.target)) {
                modal.classList.toggle("show");
                e.stopPropagation();
            } else if (
                e.target === modal ||
                e.target === modalCancel ||
                modalCancel.contains(e.target)
            ) {
                modal.classList.remove("show");
            }
        });
    }
}
setupModalInteraction(".category-overlay", "#category button");
setupModalInteraction(".priority-overlay", "#priority button");

// Admin ticket assign button
const btnAssign = document.querySelectorAll(".btn-group .btn-small");
const otherBtn = document.querySelectorAll("#other");
const assignModal = document.querySelector(".assign-overlay");
const assignModalCancel = document.querySelector(".assign-overlay .close");
if (btnAssign.length > 0) {
    document.addEventListener("click", (e) => {
        btnAssign.forEach((btn) => {
            const parent = btn.parentNode;
            const dropdownMenu = parent.querySelector(
                ":scope > .dropdown-menu"
            );

            if (e.target === btn) {
                dropdownMenu.classList.toggle("show");
                updateFormId(document.querySelector(".assign-modal form"), btn);
                e.stopPropagation();
            } else if (!parent.contains(e.target)) {
                dropdownMenu.classList.remove("show");
            }
        });

        otherBtn.forEach((btn) => {
            if (e.target === btn) {
                assignModal.classList.toggle("show");
                e.stopPropagation();
            }
        });

        if (e.target === assignModal) {
            assignModal.classList.remove("show");
        }
    });

    assignModalCancel.addEventListener("click", () =>
        assignModal.classList.remove("show")
    );
}

function updateFormId(form, btn, ticketForm = true) {
    let id = 1;
    if (ticketForm) {
        id = btn.closest("tr")?.querySelector(".ticket-details")
            ?.dataset.ticketId;
    } else {
        id = btn.closest("tr")?.querySelector("[data-category-id]")
            ?.dataset.categoryId;
    }
    if (form && id) {
        const formUrl = form.getAttribute("action");
        form.setAttribute("action", formUrl.replace(/(\d+)(?!.*\d)/, id));
    }
}

// Admin category page add category
const addCategoryBtn = document.getElementById("add-category");
if (addCategoryBtn) {
    const addCategoryModal = document.querySelector(".add-category-overlay");
    const addCategoryModalCancel = addCategoryModal.querySelector(".close");

    document.addEventListener("click", (e) => {
        if (e.target === addCategoryBtn) {
            addCategoryModal.classList.toggle("show");
            e.stopPropagation();
        } else if (
            e.target === addCategoryModalCancel ||
            addCategoryModalCancel.contains(e.target) ||
            e.target === addCategoryModal
        ) {
            addCategoryModal.classList.remove("show");
        }
    });
}

// Admin side menu ticket type list toggle
const globalTicketsSide = document.querySelector(".slide-menu");
if (globalTicketsSide) {
    globalTicketsSide.parentNode.addEventListener("click", () => {
        globalTicketsSide.parentNode.classList.toggle("is-expanded");
    });
}

// Admin ticket view quick actions toggle
const btnLight = document.querySelector(".btn-light");
const dropdown = document.querySelector(".btn-list .dropdown");
if (btnLight && dropdown) {
    document.addEventListener("click", (e) => {
        if (e.target === btnLight || btnLight.contains(e.target)) {
            dropdown.classList.toggle("show");
        } else {
            dropdown.classList.remove("show");
        }
        e.stopPropagation();
    });
}

// Admin dashboard current time
const headerTime = document.querySelector(".header-info .header-time span");
if (headerTime) {
    updateTime();
    setInterval(updateTime, 60000);
}

function formatTime(date) {
    let hours = date.getHours();
    const minutes = date.getMinutes();
    const ampm = hours >= 12 ? "PM" : "AM";

    hours = hours % 12 || 12;
    const formattedMinutes = minutes < 10 ? `0${minutes}` : minutes;

    return `${hours}:${formattedMinutes} ${ampm}`;
}

function updateTime() {
    const now = new Date();
    headerTime.innerHTML = formatTime(now);
}
