<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
    crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
      $(function() {
        $('#save').click(function() {
          $('#myForm').submit()
          $('#tambahdata').modal('hide')
        })
      })
    </script>

    <title>User</title>
  </head>
  <body>

  <div class="container mt-3">
    <h1>Annyeong, <?= session()->get('id_nama'); ?>! Borahae </h1>
    <a class="btn btn-primary" href="/user/tambahdata" role="button">Tambah Data</a>
    <table class="table mt-3">
      <thead class="thead-light">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">Email</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
    </tbody>

    <?php $i = 1; ?>
    <?php foreach ($user as $row) : ?>
      <tr>
        <td><?= $i; ?> </td>
        <td><?= $row['nama']; ?></td>
        <td><?= $row['email']; ?></td>
        <td>
          <a class="btn btn-success" href="/user/edit/<?= $row['id_user']; ?>" role="button">Edit</a>
          <a class="btn btn-danger text-white" onclick="hapusData(<?= $row['id_user']; ?>)" role="button">Delete</a>
        </td>
      </tr>
      <?php $i++; ?>
    <?php endforeach; ?>
    </tbody>
    </table>

    <a class="btn btn-primary" href="<?= base_url('login/logout'); ?>" role="button">Logout</a>
  </div>

  <script>
    function hapusData(id)
    {
      message = confirm('Apakah Anda yakin ingin menghapus data?')
      
      if (message) {
        window.location.href = ("<?= base_url('user/delete'); ?>") + "/" + id
      } else return false
    }
  </script>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
    crossorigin="anonymous"></script>
  </body>
</html>