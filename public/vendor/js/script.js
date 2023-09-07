 // Ambil elemen quantity input dan tombol tambah/kurang
 const quantityInput = document.getElementById("quantity");
 const incrementButton = document.getElementById("tambah");
 const decrementButton = document.getElementById("kurang");
 const total = document.getElementById('total');
 const price = document.getElementById('price');

 // Tambahkan event listener untuk tombol tambah
 incrementButton.addEventListener("click", () => {
   // Ambil nilai quantity saat ini dan tambahkan 1
   let currentQuantity = parseInt(quantityInput.value);
   currentQuantity++;
   let currentPrice = parseFloat(price.value);
    let harga = currentQuantity * currentPrice ;
   
   // Update nilai quantity input
   total.value = harga.toFixed();
   quantityInput.value = currentQuantity;
 });

 // Tambahkan event listener untuk tombol kurang
 decrementButton.addEventListener("click", () => {
   // Ambil nilai quantity saat ini dan kurangkan 1, tetapi tidak kurang dari 1
   let currentQuantity = parseInt(quantityInput.value);
   if (currentQuantity > 1) {
     currentQuantity--;
     let currentPrice = parseFloat(price.value);
    let harga = currentQuantity * currentPrice ;
   
    // Update nilai quantity input
    total.value = harga.toFixed();
     quantityInput.value = currentQuantity;
   }
 });