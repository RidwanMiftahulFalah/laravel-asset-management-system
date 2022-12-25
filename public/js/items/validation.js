const disposable = document.querySelectorAll('.disposable');
const stock = document.getElementById('stock');
const condition = document.getElementById('condition-option');

// Check if 'disposable' radio button with id "tidak" is checked
const isNotDisposable = document.querySelector('input[id="tidak"]:checked');

// If radio button with id "tidak" is checked, set readonly attribute to stock input element
if (isNotDisposable) {
  stock.readOnly = true;
}

if (!isNotDisposable) {
  condition.style.display = 'none';
}

// Loop through array of elements that has "disposable" class
for (let i = 0; i < disposable.length; i++) {
  // Add event listener to every element that has "disposable" class
  disposable[i].addEventListener('click', () => {
    if (disposable[i].value == 1) {
      stock.value = '0';
      stock.readOnly = false;
      condition.style.display = 'none';
    } else {
      stock.value = '1';
      stock.readOnly = true;
      condition.style.display = '';
    }
  });
}
