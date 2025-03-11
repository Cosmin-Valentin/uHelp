const asideToggleBtn = document.querySelector(".app-sidebar-toggle button");
const appAside = document.querySelector(".app-aside");
const agentMain = document.querySelector(".agent-main");

if (asideToggleBtn && appAside) {
    asideToggleBtn.addEventListener("click", function (e) {
        appAside.classList.toggle("is-open");
        agentMain.classList.toggle("blur");

        if (appAside.classList.contains("is-open")) {
            document.addEventListener("click", outsideClickListener);
            document.addEventListener("touchstart", outsideClickListener);
        }
    });
}

function outsideClickListener(e) {
    if (!appAside.contains(e.target) && !asideToggleBtn.contains(e.target)) {
        appAside.classList.remove("is-open");
        agentMain.classList.remove("blur");

        document.removeEventListener("click", outsideClickListener);
        document.removeEventListener("touchstart", outsideClickListener);
    }
}
