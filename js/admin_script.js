let profile = document.querySelector('.header .flex .profile');

document.querySelector('#user-btn').onclick = () =>{
   profile.classList.toggle('active')
   navbar.classList.remove('active');
}

let navbar = document.querySelector('.header .flex .navbar');

document.querySelector('#menu-btn').onclick = () =>{
   navbar.classList.toggle('active');
   profile.classList.remove('active');
}

window.onscroll = () =>{
   profile.classList.remove('active');
   navbar.classList.remove('active');
}

subImages = document.querySelectorAll('.update-product .image-container .sub-images img');
mainImage = document.querySelector('.update-product .image-container .main-image img');

subImages.forEach(images =>{
   images.onclick = () =>{
      let src = images.getAttribute('src');
      mainImage.src = src;
   }
});



// Show Image chossed
var inputUpload = document.getElementById("userPhoto"),
    image = document.getElementById("photo");
if (inputUpload) {
    const imageSrc = image.getAttribute("src");
    inputUpload.onchange = () => {
        let reader = new FileReader();
        if (inputUpload.files[0]) {
            reader.readAsDataURL(inputUpload.files[0]);
        } else {
            image.setAttribute("src", imageSrc);
            image.classList.remove("show");
        }
        reader.onload = () => {
            image.setAttribute("src", reader.result);
            image.classList.add("show");
        };
    };
}
