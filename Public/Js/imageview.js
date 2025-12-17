const imageProfile = document.querySelector(".image-profile");
const urlImage = document.querySelector(".url-image");

urlImage.addEventListener('input', () => {
    const url = urlImage.value.trim();

    imageProfile.src = url || "/Public/Images/noprofile.jpeg";
})