var printCertificate = document.querySelector('#printCertificate');
printCertificate.addEventListener("click",function (e) {
    e.preventDefault();
    window.print();
})
