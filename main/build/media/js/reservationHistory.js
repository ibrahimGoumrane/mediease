document.addEventListener("DOMContentLoaded", () => {
    const showBtns = document.querySelectorAll(".show-details");
    const hideBtns = document.querySelectorAll(".hide-details");
    const detailsDivs = document.querySelectorAll(".details");

    showBtns.forEach((showBtn, index) => {
        showBtn.addEventListener("click", () => {
            detailsDivs[index].classList.remove("hidden");
            showBtn.classList.add("hidden");
            hideBtns[index].classList.remove("hidden");
        });
    });

    hideBtns.forEach((hideBtn, index) => {
        hideBtn.addEventListener("click", () => {
            detailsDivs[index].classList.add("hidden");
            showBtns[index].classList.remove("hidden");
            hideBtn.classList.add("hidden");
        });
    });
});