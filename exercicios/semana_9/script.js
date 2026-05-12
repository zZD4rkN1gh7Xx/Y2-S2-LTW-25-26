function attachBuyEvents() {
    const buttons = document.querySelectorAll('#products button');

    for (const button of buttons) {
        button.addEventListener('click', function (e) {

            const article = e.currentTarget.parentElement;

            const id = article.getAttribute('data-id');
            const name = article.querySelector('h2').textContent;
            const price = parseInt(article.querySelector('.price').textContent);
            const quantity = parseInt(article.querySelector('input').value);
            const total = price * quantity;

            const existingRow = document.querySelector(`#cart table tr[data-id="${id}"]`);

            if (existingRow) {
                existingRow.querySelector('.quantity').textContent = quantity;
                existingRow.querySelector('.total').textContent = total;
            } else {
                const table = document.querySelector('#cart table');
                const row = document.createElement('tr');
                row.setAttribute('data-id', id);
                table.appendChild(row);

                const cells = [
                    { className: 'id', content: id },
                    { className: 'name', content: name },
                    { className: 'quantity', content: quantity },
                    { className: 'price', content: price },
                    { className: 'total', content: total },
                ];

                for (const cell of cells) {
                    const td = document.createElement('td');
                    td.className = cell.className;
                    td.textContent = cell.content;
                    row.appendChild(td);
                }

                const deleteTd = document.createElement('td');
                const deleteLink = document.createElement('a');
                deleteLink.textContent = 'Delete';
                deleteLink.href = '#';
                deleteLink.addEventListener('click', function (e) {
                    e.preventDefault();
                    row.remove();
                    updateCartTotal();
                });
                deleteTd.appendChild(deleteLink);
                row.appendChild(deleteTd);
            }

            updateCartTotal();

        });
    }
}


function updateCartTotal() {
    const totals = document.querySelectorAll('#cart table .total');
    let cartTotal = 0;

    for (const total of totals) {
        cartTotal += parseInt(total.textContent);
    }

    document.querySelector('#cart tfoot tr th:last-child').textContent = cartTotal;
}

attachBuyEvents();