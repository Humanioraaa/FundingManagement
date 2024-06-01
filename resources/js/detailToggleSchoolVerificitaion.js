document.addEventListener("DOMContentLoaded", function () {
    // Menambah event listener pada setiap button detail
    document
        .querySelectorAll("[school-verification-id]")
        .forEach(function (btn) {
            btn.addEventListener("click", function (event) {
                // Mengambil nomor urut dari ID button
                var idNumber = btn.getAttribute("school-verification-id");
                // Mengonversi nomor urut menjadi ID elemen detail yang sesuai
                var detailSekolahId = "detailSekolah" + idNumber;
                var detailPendaftarId = "detailPendaftar" + idNumber;
                console.log(event.target);
                // Toggle class 'hidden' pada elemen detail sekolah
                if (event.target.matches("#btnDetailSekolah")) {
                    // Jika keduanya tidak memiliki kelas "hidden", lakukan sesuatu
                    document
                        .getElementById(detailSekolahId)
                        .classList.remove("hidden");
                    document
                        .getElementById(detailPendaftarId)
                        .classList.add("hidden");
                    document.getElementById(detailSekolahId).scrollTo(0, 0);
                }
                if (event.target.matches("#btnDetailPendaftar")) {
                    document
                        .getElementById(detailPendaftarId)
                        .classList.remove("hidden");
                    document
                        .getElementById(detailSekolahId)
                        .classList.add("hidden");
                    document.getElementById(detailPendaftarId).scrollTo(0, 0);
                }
            });
        });
});
