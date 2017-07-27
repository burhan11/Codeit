$(document).ready(function () {
  var container = document.querySelector('#masonry');
    var masonry = new Masonry(container, {
      columnWidth: 15,
      itemSelector: '.post'
    });
});
