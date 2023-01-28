const disposable = document.querySelectorAll('.disposable');
const stock = document.getElementById('stock');

// Check if 'disposable' radio button with id "tidak" is checked
const isNotDisposable = document.querySelector('input[id="tidak"]:checked');

// If radio button with id "tidak" is checked, set readonly attribute to stock input element
if (isNotDisposable) {
  stock.readOnly = true;
}

// Loop through array of elements that has "disposable" class
for (let i = 0; i < disposable.length; i++) {
  // Add event listener to every element that has "disposable" class
  disposable[i].addEventListener('click', () => {
    if (disposable[i].value == 1) {
      stock.readOnly = false;
    } else {
      stock.readOnly = true;
    }
  });
}

