let navbar = document.querySelector('.header .navbar');
let accountBox = document.querySelector('.header .account-box');

document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');
    accountBox.classList.remove('active');
}

document.querySelector('#user-btn').onclick = () =>{
    accountBox.classList.toggle('active');
    navbar.classList.remove('active');
 
    
}

window.onscroll = () =>{
    navbar.classList.remove('active');
    accountBox.classList.remove('active');
}


document.querySelector('#close-update').onclick = () =>{
   document.querySelector('.edit-product-form').style.display = 'none';
   window.location.href = 'admin_products.php';
}

let navbar2 = document.querySelector('.header2 .navbar');
let accountBox2 = document.querySelector('.header2 .account-box');

document.querySelector('#menu-btn').onclick = () =>{
    navbar2.classList.toggle('active');
    accountBox2.classList.remove('active');
}

document.querySelector('#user-btn').onclick = () =>{
    accountBox2.classList.toggle('active');
    navbar2.classList.remove('active');
 
    
}

window.onscroll = () =>{
    navbar2.classList.remove('active');
    accountBox2.classList.remove('active');
}


document.querySelector('#close-update').onclick = () =>{
   document.querySelector('.edit-product-form').style.display = 'none';
   window.location.href = 'admin_products.php';
}