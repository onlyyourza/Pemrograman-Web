// Generic version of books.js/members.js: fetch any JSON file and render
// each object as one table row, taking the cell values from the given keys
async function loadList(jsonFile, keys) {
    const tbody = document.querySelector(".table-responsive table tbody");
    const loading = document.getElementById("loading-indicator");
    if (!tbody) return;

    loading.style.display = "block";
    tbody.innerHTML = "";

    try {
        // simulate network delay so the loading indicator is visible
        await new Promise((resolve) => setTimeout(resolve, 3000));

        const res = await fetch(jsonFile);
        if (!res.ok) {
            throw new Error("Failed to fetch data (status " + res.status + ")");
        }
        const items = await res.json();

        items.forEach(function (item) {
            const tr = document.createElement("tr");
            let cells = "";
            keys.forEach(function (key) {
                cells += "<td>" + item[key] + "</td>";
            });
            tr.innerHTML =
                cells +
                "<td>" +
                "<button type=\"button\">Edit</button> " +
                "<button type=\"button\" class=\"btn-delete\">Delete</button>" +
                "</td>";
            tbody.appendChild(tr);
        });
    } catch (err) {
        // colspan follows the number of keys + the Action column
        tbody.innerHTML =
            "<tr><td colspan=\"" + (keys.length + 1) + "\">Failed to load data: " + err.message + "</td></tr>";
    } finally {
        loading.style.display = "none";
    }
}
