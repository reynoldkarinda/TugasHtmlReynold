var currentImageIndex = 0;
var galleryImages = [
    "assets/images/mee.jpg",
    "assets/images/ayam.jpeg",
    "assets/images/bgproyek.jpg",
    "assets/images/hmee.jpg",
    "assets/images/kmk.jpg",
    "assets/images/ngamen.jpg",
    "assets/images/omk.jpeg",
    "assets/images/photo.jpeg",
    // Tambahkan URL gambar-gambar lainnya di sini
];

// Memuat gambar pertama saat halaman dimuat
window.onload = function() {
    displayImages();
};

function nextImage() {
    currentImageIndex = (currentImageIndex + 1) % galleryImages.length;
    displayImages();
}

function previousImage() {
    currentImageIndex = (currentImageIndex - 1 + galleryImages.length) % galleryImages.length;
    displayImages();
}

function displayImages() {
    var displayedImage = document.getElementById("displayedImage");
    displayedImage.src = galleryImages[currentImageIndex];

    toggleImageButtons();
}

function toggleImageButtons() {
    var previousButton = document.getElementById("previousImageButton");
    var nextButton = document.getElementById("nextImageButton");

    // Menyembunyikan tombol "Previous" jika gambar pertama sedang ditampilkan
    previousButton.style.display = currentImageIndex === 0 ? "none" : "inline-block";
    // Menyembunyikan tombol "Next" jika gambar terakhir sedang ditampilkan
    nextButton.style.display = currentImageIndex === galleryImages.length - 1 ? "none" : "inline-block";
}

// Menambahkan event listener untuk tombol "Previous"
document.getElementById("previousImageButton").addEventListener("click", previousImage);
// Menambahkan event listener untuk tombol "Next"
document.getElementById("nextImageButton").addEventListener("click", nextImage);
