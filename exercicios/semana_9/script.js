function attachBuyEvents() {
    const buttons = document.querySelectorAll('#products button');

    for (const button of buttons) {
        button.addEventListener('click', function (e) {

            const article = e.currentTarget.parentElement;
            console.log(article);

            article.classList.toggle('sale');

            const id = article.getAttribute('data-id');
            console.log('Product ID:', id);

            const name = article.querySelector('h2').textContent;
            const price = article.querySelector('.price').textContent;
            const quantity = article.querySelector('input').value;

            console.log('Name:', name);
            console.log('Price:', price);
            console.log('Quantity:', quantity);
        })
    }
}

attachBuyEvents()