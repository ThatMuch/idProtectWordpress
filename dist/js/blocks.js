(function (wp) {
    const { registerBlockType } = wp.blocks;
    const {RichText} = wp.editor;
    const {components, editor, blocks, element, i18n} = wp;
  document.addEventListener('DOMContentLoaded', function () {
  var acc = document.getElementsByClassName("accordion-faq");
  var i;
  for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function () {
      this.classList.toggle("active");
      var panel = this.nextElementSibling;
      if (panel.style.display === "block") {
        panel.style.display = "none";
      } else {
        panel.style.display = "block";
      }
    });
  }
});})(window.wp);