<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?= $title ?></title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- fontawesome -->
  <link rel="stylesheet" href="<?= base_url('fontawesome-free-5.15.4-web/css/all.css') ?>">

  <!-- datatables -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

  <style>
    body {
      font-family: 'monserat', sans-serif;
      padding: 50px;
      background-image: url('/img/bg.png');
    }

    .pastel-silver {
      background-color: #fffadd;
    }

    #menu {
      color: #333;
      border-radius: 4px;
      background: #fff;
      box-shadow: 0 6px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);
      transition: .3s transform cubic-bezier(.155, 1.105, .295, 1.12), .3s box-shadow, .3s -webkit-transform cubic-bezier(.155, 1.105, .295, 1.12);
      padding: 7px 40px 9px 18px;
      cursor: pointer;
    }

    #menu:hover {
      transform: scale(1.05);
      box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06);
    }

    @media(max-width: 990px) {
      .card {
        margin: 20px;
      }
    }
  </style>
</head>

<body>
  <div class="container <?= $title == 'Login' ? '' : 'shadow-lg rounded-lg border-0 card pastel-silver' ?>">

    <?php // $this->include('layout/navbar') 
    ?>

    <?= $this->renderSection('content') ?>

    <!-- footer -->
    <?= $this->include('Layout/footer')
    ?>



  </div>
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

  <script>
    // datatable
    $(document).ready(function() {
      $('#myTable').DataTable();
    });

    // membuat kode untuk kode data barang
    $(document).ready(function() {
      $.ajax({
        url: "<?= site_url('alternatif/kode') ?>",
        type: "GET",
        success: function(hasil) {
          // alert(hasil);
          var obj = $.parseJSON(hasil);
          $('#kodeAlternatif').val(obj);
        }
      });
    });

    // membuat kode untuk kode data barang
    $(document).ready(function() {
      $.ajax({
        url: "<?= site_url('kriteria/kode') ?>",
        type: "GET",
        success: function(hasil) {
          // alert(hasil);
          var obj = $.parseJSON(hasil);
          $('#kodeKriteria').val(obj);
        }
      });
    });
  </script>
</body>

</html>