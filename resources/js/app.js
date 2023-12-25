import "./bootstrap";

(function () {
    const citySelectElement = document.querySelector("#city");

    const urlParams = new URLSearchParams(window.location.search);
    const myLocation = urlParams.get("location");

    citySelectElement.value = myLocation || citySelectElement.value;

    citySelectElement.addEventListener("change", (e) => {
        window.location.href = `/?location=${e.target.value}`;
    });
})();
