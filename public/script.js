function previewImage(event, imageId, labelId) {
  var reader = new FileReader();
  reader.onload = function(){
      var output = document.getElementById(imageId);
      output.src = reader.result;
      var label = document.getElementById(labelId);
      label.classList.add("uploaded");
  };
  reader.readAsDataURL(event.target.files[0]);
}

document.addEventListener("DOMContentLoaded", function() {
    // toggle the aside on click of the filter-drop button
    document.getElementById("filter-drop").addEventListener("click", function() {
      document.getElementById("filter-aside").classList.toggle("collapse");
    });
});

const categoryAccordionButton = document.querySelector('#categoryAccordion .accordion-button');
const categoryAccordionCollapse = document.querySelector('#categoryAccordion .accordion-collapse');
const categoryChevronIcon = categoryAccordionButton.querySelector('.bi-chevron-down');
categoryAccordionButton.addEventListener('click', function() {
  if (categoryAccordionCollapse.classList.contains('show')) {
    categoryAccordionCollapse.classList.remove('show');
    categoryChevronIcon.classList.replace('bi-chevron-up', 'bi-chevron-down');
  } else {
    categoryAccordionCollapse.classList.add('show');
    categoryChevronIcon.classList.replace('bi-chevron-down', 'bi-chevron-up');
  }
});

const sizeAccordionButton = document.querySelector('#sizeAccordion .accordion-button');
const sizeAccordionCollapse = document.querySelector('#sizeAccordion .accordion-collapse');
const sizeChevronIcon = sizeAccordionButton.querySelector('.bi-chevron-down');
sizeAccordionButton.addEventListener('click', function() {
  if (sizeAccordionCollapse.classList.contains('show')) {
    sizeAccordionCollapse.classList.remove('show');
    sizeChevronIcon.classList.replace('bi-chevron-up', 'bi-chevron-down');
  } else {
    sizeAccordionCollapse.classList.add('show');
    sizeChevronIcon.classList.replace('bi-chevron-down', 'bi-chevron-up');
  }
});

const colorContainer = document.querySelector('.color-container');
const addColorButton = document.querySelector('.add-color');
function addColor() {
  const colorItem = document.createElement('div');
  colorItem.classList.add('color-item');
  colorItem.style.display = 'grid';
  colorItem.style.gridTemplateColumns = '2fr 1fr 1fr';
  colorItem.style.gap = '10px';

  const colorNameInput = document.createElement('input');
  colorNameInput.type = 'text';
  colorNameInput.name = 'color-name[]';
  colorNameInput.classList.add('form-control');
  colorNameInput.placeholder = 'Color Name';
  colorNameInput.required = true;

  const colorCodeInput = document.createElement('input');
  colorCodeInput.type = 'color';
  colorCodeInput.name = 'color-code[]';
  colorCodeInput.classList.add('form-control');
  colorCodeInput.required = true;

  const removeButton = document.createElement('button');
  removeButton.type = 'button';
  removeButton.classList.add('btn', 'btn-outline-secondary', 'remove-color');
  removeButton.textContent = 'Remove';
  removeButton.addEventListener('click', () => {
    colorItem.remove();
  });

  colorItem.appendChild(colorNameInput);
  colorItem.appendChild(colorCodeInput);
  colorItem.appendChild(removeButton);

  colorContainer.appendChild(colorItem);
}
addColorButton.addEventListener('click', addColor);
const categorySelect = document.querySelector('#category');
categorySelect.addEventListener('change', () => {
    const category = categorySelect.value;
    fetch(`/filterByC/${category}`)
        .then(response => response.text())
        .then(html => {
            const productContainer = document.querySelector('.p-list');
            productContainer.innerHTML = html;
        });
});

function f() {
    const selectedCategory = document.querySelector('#category').value;
    fetch(`/filterByC/${selectedCategory}`)
        .then(response => response.json())
        .then(data => {
            const productContainer = document.querySelector('.p-list');
            productContainer.innerHTML = '';

            if (!data.products.data || data.products.data.length === 0) {
                productContainer.innerHTML = '<p>No products found</p>';
                return;
            }

            data.products.data.forEach(product => {
                const productHtml = `
                    <div class="m-3 card bg-ligth p-2 text-start border-bottom-primary">
                        <a href="/products/${product.id}">
                            <img class="card-img-top" src="/image/${product.img1}" alt="product">
                        </a>
                        <a href="/products/${product.id}" class="mt-1 text-dark">${product.name}</a>
                        <div class="d-flex justify-content-between align-items-center">
                            <span>$${product.price}</span>
                        </div>
                        <div class="d-flex justify-content-between gap-1">
                            <a href="/products/${product.id}" class="btn btn-outline-primary flex-grow-1" style="width: 70%;">Details</a>
                            <input type="hidden" name="product_idc" value="${product.id}">
                            <a href="#" onclick='addtocart(this)' class="btn btn-outline-primary bi bi-cart-plus" style="width: 28%;"></a>
                        </div>
                    </div>
                `;

                productContainer.innerHTML+=productHtml;
            });
            const paginationLinks = document.querySelector('.pg');
            paginationLinks.classList.add('d-none');
            document.querySelector('#clear').classList.remove('d-none');
        })
        .catch(error => {
            const productContainer = document.querySelector('.p-list');
            productContainer.innerHTML = `<p>Error: ${error.message}</p>`;
        });
}

function changemin(e) {
    maxprice = document.querySelector('#maxpin').value;
    var mininp = document.querySelector('#minpin');
    var minrinp = document.querySelector('#minp');

    minprice = Number(e.value);
    minrinp.value = Number(e.value);
    mininp.value = Number(e.value);

    fetch("/products/filter/" + minprice + "/" + maxprice)
        .then(response => response.json())
        .then(data =>
        {
            const productContainer = document.querySelector('.p-list');
            productContainer.innerHTML = '';

            if (!data.products.data || data.products.data.length === 0) {
                productContainer.innerHTML = '<p>No products found</p>';
                return;
            }

            data.products.data.forEach(product => {
                const productHtml = `
                    <div class="m-3 card bg-ligth p-2 text-start border-bottom-primary">
                        <a href="/products/${product.id}">
                            <img class="card-img-top" src="/image/${product.img1}" alt="product">
                        </a>
                        <a href="/products/${product.id}" class="mt-1 text-dark">${product.name}</a>
                        <div class="d-flex justify-content-between align-items-center">
                            <span>$${product.price}</span>
                        </div>
                        <div class="d-flex justify-content-between gap-1">
                            <a href="/products/${product.id}" class="btn btn-outline-primary flex-grow-1" style="width: 70%;">Details</a>
                            <input type="hidden" name="product_idc" value="${product.id}">
                            <a href="" onclick='addtocart(this)' class="btn btn-outline-primary bi bi-cart-plus" style="width: 28%;"></a>
                        </div>
                    </div>
                `;

                productContainer.innerHTML+=productHtml;
            });
            const paginationLinks = document.querySelector('.pg');
            paginationLinks.classList.add('d-none');
            document.querySelector('#clear').classList.remove('d-none');
        })
        .catch(error => console.error(error));
}

function changemax(e) {
    minprice = document.querySelector('#minpin').value;
    var maxinp = document.querySelector('#maxpin');
    var maxrinp = document.querySelector('#maxp');

    maxprice = Number(e.value);
    maxrinp.value = Number(e.value);
    maxinp.value = Number(e.value);

    fetch("/products/filter/" + minprice + "/" + maxprice)
        .then(response => response.json())
        .then(data =>
        {
            const productContainer = document.querySelector('.p-list');
            productContainer.innerHTML = '';

            if (!data.products.data || data.products.data.length === 0) {
                productContainer.innerHTML = '<p>No products found</p>';
                return;
            }

            data.products.data.forEach(product => {
                const productHtml = `
                    <div class="m-3 card bg-ligth p-2 text-start border-bottom-primary">
                        <a href="/products/${product.id}">
                            <img class="card-img-top" src="/image/${product.img1}" alt="product">
                        </a>
                        <a href="/products/${product.id}" class="mt-1 text-dark">${product.name}</a>
                        <div class="d-flex justify-content-between align-items-center">
                            <span>$${product.price}</span>
                        </div>
                        <div class="d-flex justify-content-between gap-1">
                            <a href="/products/${product.id}" class="btn btn-outline-primary flex-grow-1" style="width: 70%;">Details</a>
                            <input type="hidden" name="product_idc" value="${product.id}">
                            <a href="" onclick='addtocart(this)' class="btn btn-outline-primary bi bi-cart-plus" style="width: 28%;"></a>
                        </div>
                    </div>
                `;

                productContainer.innerHTML+=productHtml;
            });
            const paginationLinks = document.querySelector('.pg');
            paginationLinks.classList.add('d-none');
            document.querySelector('#clear').classList.remove('d-none');
        })
        .catch(error => console.error(error));
}

function addtocart(e) {
    event.preventDefault();

    let mycart= document.querySelector('.my-cart');

    idv = e.parentNode.childNodes[3].value;

    const xhr = new XMLHttpRequest();
    xhr.open('GET', `/addtocart/${idv}`, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
      if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
         const response = JSON.parse(this.responseText);
         alert(response.message)
      }
    }
    xhr.send();
  }


// change quantity
function setprice(){
        var minusBtns = document.getElementsByClassName('minus');
        var plusBtns = document.getElementsByClassName('plus');
        var total_price1 = document.querySelector('.total_price1');
        var total_price2 = document.querySelector('.total_price2');
        let total_price_ps=document.querySelectorAll('.pprice')
        let tp=0
        let tp2=0
        for (var i = 0; i < total_price_ps.length; i++) {
            tp += Number(total_price_ps[i].innerText);
        }
        initial_price=tp
        tp2=tp
        total_price1.innerText=tp
        total_price2.innerText=tp
        Array.from(minusBtns).forEach(
            function(minusBtn){
                minusBtn.addEventListener('click', function(e){
                    var quantityInput = e.target.parentElement.querySelector('input');
                    let product_id = e.target.parentElement.parentElement.querySelector('.product_id').value
                    var price_p = Number(e.target.parentElement.parentElement.querySelector('.pprice').innerText)
                    var quantity = Number(quantityInput.value) - 1;
                    quantity = Math.max(quantity, 1);
                    quantityInput.value = quantity;
                    if(tp==tp2){
                        tp = Math.max(quantity, tp2);
                    }
                    tp = tp - price_p;
                    total_price1.innerText=tp
                    total_price2.innerText=tp
                    // send data
                    fetch(`/update_cat/${quantity}/${product_id}/${price_p}`, {
                        method: 'GET',
                        }).then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                        }).then(data => {
                            console.log(data);
                        }).catch(error => {
                            console.error('There was a problem with the fetch operation:', error);
                        });
                })
        })
        Array.from(plusBtns).forEach(function(plusBtn){
            plusBtn.addEventListener('click', function(e){
                var quantityInput = e.target.parentElement.querySelector('input')
                    let product_id = e.target.parentElement.parentElement.querySelector('.product_id').value;
                    var price_p2 = Number(e.target.parentElement.parentElement.querySelector('.pprice').innerText)
                var initial_price = Number(e.target.parentElement.parentElement.querySelector('.initial_price').value)
                var quantity = Number(quantityInput.value) + 1
                quantityInput.value = quantity;
                tp+=price_p2
                total_price1.innerText=tp
                total_price2.innerText=tp
                // send data
                fetch(`/update_cat/${quantity}/${product_id}/${price_p2}`, {
                    method: 'GET',
                    }).then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                    }).then(data => {
                        console.log(data);
                    }).catch(error => {
                        console.error('There was a problem with the fetch operation:', error);
                    });

            })
        })
}

//change size
function setSize(el){
    let size=el.value
    let product_id=el.parentElement.querySelector('.product_id').value;
    fetch(`/update_catsize/${size}/${product_id}`, {
        method: 'GET',
        }).then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
        }).then(data => {
            console.log(data);
        }).catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
}

function selectOption(e,id){
    let options =document.querySelector(`#${id}`)
    for(let el of options){
        el.removeAttribute('selected')
    }
    e.setAttribute('selected',true)
}

function selectOption2(e){
    let options =e.parentNode
    for(let el of options){
        el.removeAttribute('selected')
    }
    e.setAttribute('selected',true)
}

function deletefromcart(pid){
    const xhr = new XMLHttpRequest();
    xhr.open('GET', `deletefromcart/${pid}`, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
      if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
        const response = JSON.parse(this.responseText);
        console.log(response);
        if (response.success) {
            location.reload(true);
        }
      }
    }
    xhr.send();
}






