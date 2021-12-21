$(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
    // Kita sembunyikan dulu untuk loadingnya
    $("#loading").hide();
    
    $("#kecamatan").change(function(){ // Ketika user mengganti atau memilih data kecamatan
      $("#desa").hide(); // Sembunyikan dulu combobox desa nya
      $("#loading").show(); // Tampilkan loadingnya
    
      $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "../../../pemasangan/wilayah.php", // Isi dengan url/path file php yang dituju
        data: {kecamatan : $("#kecamatan").val()}, // data yang akan dikirim ke file yang dituju
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ // Ketika proses pengiriman berhasil
          $("#loading").hide(); // Sembunyikan loadingnya
          // set isi dari combobox desa
          // lalu munculkan kembali combobox desanya
          $("#desa").html(response.data_kota).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
          alert(thrownError); // Munculkan alert error
        }
      });
      });
  });