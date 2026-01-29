<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Products (AJAX)</title>
    <style>
        .container { width: 50%; margin: auto; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 6px; text-align: center; }
        input { padding: 6px; width: 70%; }
        button { padding: 6px 12px; }
    </style>
</head>
<body>
<div class="container">
    <h2>Search Products</h2>
    <input type="text" id="searchBox" placeholder="Type product name...">
    <button onclick="searchProducts()">Search</button>

    <table id="resultsTable">
        <thead>
            <tr>
                <th>Name</th>
                <th>Profit</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="resultsBody">
        </tbody>
    </table>
</div>

<script>
function searchProducts() {
    const term = document.getElementById('searchBox').value;

    fetch('fetch_product.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ action: term || 'fetch_product' })
    })
    .then(response => response.json())
    .then(data => {
        const tbody = document.getElementById('resultsBody');
        tbody.innerHTML = '';

        if (data.error) {
            tbody.innerHTML = `<tr><td colspan="3">${data.error}</td></tr>`;
            return;
        }

        if (data.length === 0) {
            tbody.innerHTML = `<tr><td colspan="3">No products found</td></tr>`;
            return;
        }

        data.forEach(product => {
            tbody.innerHTML += `
                <tr>
                    <td>${product.name}</td>
                    <td>${product.profit}</td>
                    <td>
                        <a href="edit_product.php?name=${product.name}&BP=${product.buying_price}&SP=${product.selling_price}&display=${product.display}">Edit</a>
                        <a href="delete_product.php?name=${product.name}&BP=${product.buying_price}&SP=${product.selling_price}">Delete</a>
                    </td>
                </tr>
            `;
        });
    })
    .catch(err => console.error('Error:', err));
}
document.getElementById('searchBox').addEventListener('keyup', searchProducts);
</script>
</body>
</html>