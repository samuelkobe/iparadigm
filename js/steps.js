var headers = document.querySelectorAll(".step-header");

for (var i = 0; i < headers.length; i++) {
  headers[i].addEventListener("click", function (e) {
    if (this.parentNode.classList.contains("open")) {
      this.parentNode.classList.remove("open");
    } else {
      this.parentNode.classList.add("open");
    }
  });
}