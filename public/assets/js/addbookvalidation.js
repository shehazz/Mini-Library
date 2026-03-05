function validate() {
    let isValid = true;

    // Book Title
    const bookname = document.querySelector('input[name="bookname"]');
    const booknameErr = document.getElementById('booknameErr');
    if (bookname.value.trim() === '') {
        booknameErr.textContent = 'Book title is required.';
        bookname.classList.add('is-invalid');
        bookname.classList.remove('is-valid');
        isValid = false;
    } else {
        booknameErr.textContent = '';
        bookname.classList.remove('is-invalid');
        bookname.classList.add('is-valid');
    }

    // Author
    const author = document.querySelector('input[name="author"]');
    const authorErr = document.getElementById('authorErr');
    if (author.value.trim() === '') {
        authorErr.textContent = 'Author name is required.';
        author.classList.add('is-invalid');
        author.classList.remove('is-valid');
        isValid = false;
    } else {
        authorErr.textContent = '';
        author.classList.remove('is-invalid');
        author.classList.add('is-valid');
    }

    // ISBN
    const isbn = document.querySelector('input[name="isbn"]');
    const isbnErr = document.getElementById('isbnErr');
    const isbnPattern = /^[0-9\-]{10,17}$/;
    if (isbn.value.trim() === '') {
        isbnErr.textContent = 'ISBN number is required.';
        isbn.classList.add('is-invalid');
        isbn.classList.remove('is-valid');
        isValid = false;
    } else if (!isbnPattern.test(isbn.value.trim())) {
        isbnErr.textContent = 'Enter a valid ISBN (e.g. 978-0735211292).';
        isbn.classList.add('is-invalid');
        isbn.classList.remove('is-valid');
        isValid = false;
    } else {
        isbnErr.textContent = '';
        isbn.classList.remove('is-invalid');
        isbn.classList.add('is-valid');
    }

    // Price
    const price = document.querySelector('input[name="bookprice"]');
    const priceErr = document.getElementById('priceErr');
    if (price.value.trim() === '') {
        priceErr.textContent = 'Book price is required.';
        price.classList.add('is-invalid');
        price.classList.remove('is-valid');
        isValid = false;
    } else if (isNaN(price.value) || Number(price.value) <= 0) {
        priceErr.textContent = 'Enter a valid price greater than 0.';
        price.classList.add('is-invalid');
        price.classList.remove('is-valid');
        isValid = false;
    } else {
        priceErr.textContent = '';
        price.classList.remove('is-invalid');
        price.classList.add('is-valid');
    }

    // Category
    const category = document.querySelector('select[name="category"]');
    const categoryErr = document.getElementById('categoryErr');
    if (category.value === '' || category.selectedIndex === 0) {
        categoryErr.textContent = 'Please select a category.';
        category.classList.add('is-invalid');
        category.classList.remove('is-valid');
        isValid = false;
    } else {
        categoryErr.textContent = '';
        category.classList.remove('is-invalid');
        category.classList.add('is-valid');
    }

    // Copies
    const copies = document.querySelector('input[name="bookquantity"]');
    const copiesErr = document.getElementById('copiesErr');
    if (copies.value === '' || Number(copies.value) < 1) {
        copiesErr.textContent = 'At least 1 copy is required.';
        copies.classList.add('is-invalid');
        copies.classList.remove('is-valid');
        isValid = false;
    } else {
        copiesErr.textContent = '';
        copies.classList.remove('is-invalid');
        copies.classList.add('is-valid');
    }

    // Cover Image
    const coverimg = document.querySelector('input[name="coverimg"]');
    const coverimgErr = document.getElementById('coverimgErr');
    if (coverimg.files.length === 0) {
        coverimgErr.textContent = 'Please upload a cover image.';
        isValid = false;
    } else {
        const allowedTypes = ['image/jpeg', 'image/png', 'image/webp', 'image/gif'];
        if (!allowedTypes.includes(coverimg.files[0].type)) {
            coverimgErr.textContent = 'Only JPG, PNG, WEBP or GIF images are allowed.';
            isValid = false;
        } else {
            coverimgErr.textContent = '';
        }
    }

    const description = document.querySelector('textarea[name="description"]');
    const descriptionErr = document.getElementById('descriptionErr');
    if (description.value.trim() === '') {
        descriptionErr.textContent = 'Book description is required.';
        description.classList.add('is-invalid');
        description.classList.remove('is-valid');
        isValid = false;
    } else {
        descriptionErr.textContent = '';
        description.classList.remove('is-invalid');
        description.classList.add('is-valid');
    }

    return isValid;
}