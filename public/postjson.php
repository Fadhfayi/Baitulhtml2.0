<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>BaitulQur'an - Penerimaan Santri Baru</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="Free HTML Templates" name="keywords">
  <meta content="Free HTML Templates" name="description">

  <script src="https://code.jquery.com/jquery-3.5.0.js"> </script>
  <!-- Favicon -->
  <link href="img/logo.png" rel="icon">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
    rel="stylesheet">

  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
</head>


<body>
  <p id="show_message" style="display: none">Form data sent. Thanks for your comments.We will update you within 24
    hours. </p>
  <span id="error" style="display: none"></span>
  <div class="container-fluid p-0" id="tampilan">
    <div>
      <div class="carousel-inner">

        <div>
          <!-- <img class="w-100"  src="img/carousel-1.webp" style="width:100%" alt="Image"> -->
          <div
            class="carousel top-0 bottom-0 start-0 end-0 d-flex flex-column align-items-center justify-content-center">
            <div class="text-start p-5" style="max-width: 600px;">
              <div class="container">
                <table>
                  <h3 class="m-0 text-primary"><span class="text-secondary">Masukan</span>Data</h3>
                  <br>
                  <form action="proses.php" id="form" method="POST">
                    <fo class="row g-3">
                      <div class="col-sm-6">
                        <label for="firstName" class="form-label">Nama Depan</label>
                        <input type="text" id="NamaDepan" class="form-control" Name="NamaDepan" placeholder="Budi"
                          value="" required="" style="color:black;">
                        <div class="invalid-feedback">
                          Nama Depan Harus Diisi.
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <label for="lastName" class="form-label">Last name</label>
                        <input type="text" id="NamaBelakang" class="form-control" Name="NamaBelakang"
                          placeholder="Nurhadi" value="" required="" style="color:black;">
                        <div class="invalid-feedback">
                          Nama Belakang Harus Diisi.
                        </div>
                      </div>

                      <div class="col-12">
                        <label for="address" class="form-label">Alamat</label>
                        <input type="text" id="Alamat" class="form-control" name="Alamat"
                          placeholder="Gg.Melon Sukoharjo" required="" style="color:black;">
                        <div class="invalid-feedback">
                          Alamat Harus Diisi.
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <label for="Number" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control" id="Nomor" Name="Nomor" placeholder="0812345678"
                          value="" required="" style="color:black;">
                        <div class="invalid-feedback">
                          Nomor Telepon Harus Diisi.
                        </div>
                      </div>

                      <div class="col-sm-6 ">
                        <label for="birth" class="form-label">Tanggal Lahir</label>
                        <input type="date" id="Lahir" class="form-control" Name="Lahir" placeholder="" value=""
                          required="" style="color:black;">
                        <div class="invalid-feedback">
                          Tanggal Lahir Harus Diisi.
                        </div>
                      </div>

                      <div class="col-12">
                        <label for="Motivation" class="form-label">Motivasi</label>
                        <textarea type="text" id="motivasi" class="form-control" name="motivasi"
                          placeholder="aku ingin jadi ustad" required="" style="color:black;">
</textarea>
                        <div class="col-sm-10">
                          <button type="submit" class="btn btn-primary" name="proses" id="kirim">KIRIM</button>
                        </div>
                        <div class="invalid-feedback">
                          motivasi Harus Diisi.
                        </div>

                  </form>


                  <div
                    class="carousel top-0 bottom-0 start-0 end-0 d-flex flex-column align-items-center justify-content-center">
                    <div class="text-start p-5" style="max-width: 600px;">
                      <div class="container">
                        <table>
                          <h3 class="m-0 text-primary"><span class="text-secondary">Lihat</span>Data</h3>
                        

                        </table>
                      </div>
                    
                    </div>
                    <div class="card-body">
                    <div class="col-sm-12 align-items-center justify-content-center flex-column">
                      <div id="show-data">
                      </div>
</div>
<script>
  $(document).ready(() => {

// Menampilkan Table Saat Awal Reload
showTable();
  function showTable() {
        const $showData = $('#show-data');

        $showData.text('Loading the JSON file.');

        // Ambil Data JSON
        $.getJSON('http://localhost/baitulhtml/json.php', (respon) => {
            // console.log(respon.code);
            // console.log(respon.status);

            // Mengatur Ulang Format Dari JSON Menjadi HTML
            const head = `<br><table id="tabelnya" class="table table-bordered ">`
            const thead = `<thead><tr><th>Nama</th><th>Alamat</th><th>Nomor</th><th>Tanggal Lahir</th></th><th>Motivasi</th><th>HAPUS DATA</th></tr></thead><tbody>`
            const markup = respon
                .map(item => `
            <tr data-id="${item.id}">
          <td>${item.id}. ${item.NamaDepan} ${item.NamaBelakang}</td>
          <td>${item.Alamat}</td>
          <td>${item.Nomor}</td>
          <td>${item.Lahir}</td>
          <td>${item.Motivasi}</td>
         
          <td>
                <button class="btn btn-danger hapus" id="hapus" data-id="${item.id}">HAPUS</button>
          </td>
            </tr>
            `)
                .join('');
            const footer = `</tbody></table>`

            // Merangkum semua data dalam satu variabel
            var list = head + thead + markup + footer;
            

            // Menampilkan Data table ke Variabel
            $showData.html(list);

            $(".hapus").click(function(){
         var id = $(this).data("id");
         console.log(id); 
            $.ajax({
              type: 'GET',
               url: 'delete.php?id='+ id,             
               success: function(data){
                   showTable();
               }
            });
         
      });
        }
        )};
      });

      // $(".hapus").click(function(){
      //    var id = $(this).data("id");
      //    console.log(id); 
      //       // $.ajax({
      //       //   type: 'GET',
      //       //    url: 'delete.php?id='+ id,             
      //       //    success: function(data){
      //       //       // showTable();
      //       //    }
      //       // });
         
      // });
      </script>

  <script >
    $(document).ready(function(){
// // hide messages 
// $("#error").hide();
// $("#show_message").hide();
// on submit...
$('#form').submit(function(e){
e.preventDefault();
// $("#error").hide();
//name required
var NamaDepan = $("NamaDepan").val();
if(NamaDepan == ""){
$("#error").fadeIn().text("NamaDepan required.");
$("NamaDepan").focus();
return false;
}
// NamaBelakang required
var NamaBelakang = $("NamaBelakang").val();
if(NamaBelakang == ""){
$("#error").fadeIn().text("NamaBelakang required");
$("NamaBelakang").focus();
return false;
}
// Alamat number required
var Alamat = $("Alamat").val();
if(Alamat == ""){
$("#error").fadeIn().text("Alamat required");
$("Alamat").focus();
return false;
}
var Nomor = $("Nomor").val();
if(Nomor == ""){
$("#error").fadeIn().text("Nomor required");
$("Nomor").focus();
return false;
}
var Lahir = $("Lahir").val();
if(Lahir == ""){
$("#error").fadeIn().text("Lahir required");
$("Lahir").focus();
return false;
}
var motivasi = $("motivasi").val();
if(motivasi == ""){
$("#error").fadeIn().text("motivasi required");
$("motivasi").focus();
return false;
}

// ajax
$.ajax({
type:"POST",
url: "proses.php",
data: $(this).serialize(), // get all form field value in serialize form
success: function(){
  $(document).scrollTop($(document).height());
          $("#NamaDepan").val('');
          $("#NamaBelakang").val('');
          $("#Alamat").val('');
          $("#Nomor").val('');
          $("#Lahir").val('');
          $("#motivasi").val('');
  const $showData = $('#show-data');

$showData.text('Loading the JSON file.');

// Ambil Data JSON
$.getJSON('json.php', (respon) => {
    // console.log(respon.code);
    // console.log(respon.status);

    // Mengatur Ulang Format Dari JSON Menjadi HTML
    const head = `<br><table id="tabelnya" class="table table-bordered ">`
    const thead = `<thead><tr><th>Nama</th><th>Alamat</th><th>Nomor</th><th>Tanggal Lahir</th></th><th>Motivasi</th></tr></thead><tbody>`
    const markup = respon
        .map(item => `
    <tr data-id="${item.id}">
  <td>${item.id}. ${item.NamaDepan} ${item.NamaBelakang}</td>
  <td>${item.Alamat}</td>
  <td>${item.Nomor}</td>
  <td>${item.Lahir}</td>
  <td>${item.Motivasi}</td>
 
  <td>
        <button class="btn btn-danger hapus" id="hapus" data-id="${item.id}">HAPUS</button>
  </td>
    </tr>
    `)
        .join('');
    const footer = `</tbody></table>`

    // Merangkum semua data dalam satu variabel
    var listdata = head + thead + markup + footer;
    const list = (listdata);

    // Menampilkan Data table ke Variabel
    $showData.html(list);
}
)}
});
});

$(".hapus").click(function(){
         var id = $(this).data("id");
         console.log(id); 
            // $.ajax({
            //   type: 'GET',
            //    url: 'delete.php?id='+ id,             
            //    success: function(data){
            //       // showTable();
            //    }
            // });
         
      });
});  


</script>

<script>
     $(document).ready(function(){
      
  });
</script>

</html>