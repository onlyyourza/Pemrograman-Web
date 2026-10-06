// Book List: rendered by the generic loadList() in list.js
document.addEventListener("DOMContentLoaded", function () {
    loadList("../data/books.json", ["title", "author", "year", "stock"]);
});
