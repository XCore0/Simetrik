<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tables / Data Image Partner</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/boxicons/css/boxicons.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/quill/quill.snow.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/quill/quill.bubble.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/remixicon/remixicon.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/simple-datatables/style.css') ?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="/public/images/Simetrik.png" alt="">
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span id="notification-count" class="badge bg-primary badge-number">0</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <!-- Notifikasi akan ditambahkan di sini -->
            <li class="dropdown-footer">
              <a href="<?= site_url('/admin/tabel-facilities') ?>">Show all notifications</a>
            </li>
          </ul><!-- End Notification Dropdown Items -->


        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <i class="fas fa-user-circle fa-2x"></i>
            <span class="d-none d-md-block dropdown-toggle ps-2"><?= session()->get('name') ?></span>
          </a><!-- End Profile Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Kevin Anderson</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?= site_url('/logout') ?>">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav collapsed" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?= site_url('/admin/dashboard') ?>">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= site_url('/admin/tabel-facilities') ?>">
          <i class="bi bi-grid"></i>
          <span>Table Facilities</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Images</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content active" data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= site_url('/admin/ImagesBesar') ?>">
              <i class="bi bi-circle"></i><span>Image Besar</span>
            </a>
          </li>
          <li>
            <a href="<?= site_url('/admin/ImagesGallery') ?>">
              <i class="bi bi-circle"></i><span>Gallery</span>
            </a>
          </li>
          <li>
            <a href="<?= site_url('/admin/ImagesApotik') ?>">
              <i class="bi bi-circle"></i><span>Kelola Apotik</span>
            </a>
          </li>
          <li>
            <a href="<?= site_url('/admin/ImagesChat') ?>">
              <i class="bi bi-circle"></i><span>Chat</span>
            </a>
          </li>
          <li>
            <a href="<?= site_url('/admin/ImagesFasilitas') ?>">
              <i class="bi bi-circle"></i><span>Fasilitas Kesehatan</span>
            </a>
          </li>
          <li>
            <a href="<?= site_url('/admin/ImagesPartner') ?>">
              <i class="bi bi-circle"></i><span>Partner dan Media</span>
            </a>
          </li>
          <li>
            <a href="<?= site_url('/admin/ImagesAcara') ?>">
              <i class="bi bi-circle"></i><span>Acara</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
    </ul>
  </aside><!-- End Sidebar -->


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><?= isset($image) ? 'Edit Image' : 'Add New Image' ?></h5>

              <!-- Form untuk menambah atau mengedit gambar -->
              <form action="<?= site_url('admin/ImagesBesar/save') ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <?php if (isset($image)): ?>
                  <input type="hidden" name="id" value="<?= esc($image['id']) ?>">
                <?php endif; ?>

                <div class="row mb-3">
                  <label for="nama" class="col-sm-2 col-form-label">Image Name</label>
                  <div class="col-sm-10">
                    <input type="text" id="nama" name="nama" class="form-control" value="<?= isset($image) ? esc($image['nama']) : '' ?>" required>
                  </div>
                </div>

                <?php if (isset($image) && $image['image']): ?>
                  <div class="row mb-3">
                    <label for="currentImage" class="col-sm-2 col-form-label">Current Image</label>
                    <div class="col-sm-10">
                      <img src="<?= base_url('images/' . esc($image['image'])) ?>" alt="<?= esc($image['nama']) ?>" style="max-width: 200px; display: block;">
                    </div>
                  </div>
                <?php endif; ?>

                <div class="row mb-3">
                  <label for="image" class="col-sm-2 col-form-label">Upload New Image</label>
                  <div class="col-sm-10">
                    <input type="file" id="image" name="image" class="form-control" <?= isset($image) ? '' : 'required' ?>>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary"><?= isset($image) ? 'Update Image' : 'Add Image' ?></button>
                    <a href="<?= site_url('admin/ImagesBesar') ?>" class="btn btn-secondary">Cancel</a>
                  </div>
                </div>
              </form>
              <!-- End Form for Adding/Editing Images -->
            </div>
          </div>

          <div class="card mt-4">
            <div class="card-body">
              <h5 class="card-title">Image List Besar</h5>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Image Name</th>
                    <th>Image Preview</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (!empty($imagesbesar)): ?>
                    <?php foreach ($imagesbesar as $index => $image): ?>
                      <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= esc($image['nama']) ?></td>
                        <td><img src="<?= base_url('images/' . esc($image['image'])) ?>" alt="<?= esc($image['nama']) ?>" style="max-width: 100px;"></td>
                        <td>
                          <a href="<?= site_url('admin/ImagesBesar/edit/' . $image['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                          <a href="<?= site_url('admin/ImagesBesar/delete/' . $image['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this image?');">Delete</a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <tr>
                      <td colspan="4">No images found.</td>
                    </tr>
                  <?php endif; ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->


  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url('assets/vendor/apexcharts/apexcharts.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/chart.js/chart.umd.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/echarts/echarts.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/quill/quill.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/simple-datatables/simple-datatables.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/tinymce/tinymce.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/php-email-form/validate.js') ?>"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url('assets/js/main.js') ?>"></script>

  <!-- Define CSRF tokens -->
  <script>
    var csrfTokenName = '<?= csrf_token() ?>';
    var csrfHash = '<?= csrf_hash() ?>';
  </script>

  <!-- Your other script files -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://js.pusher.com/7.2/pusher.min.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Inisialisasi Pusher
      const pusher = new Pusher('2591694c94adf6b75abb', {
        cluster: 'ap1',
        forceTLS: true
      });

      // Subscribe to the notifications channel
      const channel = pusher.subscribe('facility-channel');

      // Listen for the 'facility-event' event
      channel.bind('facility-event', function(data) {
        // Retrieve notifications from local storage or initialize an empty array
        const notifications = JSON.parse(localStorage.getItem('notifications')) || [];

        // Add new notification to the array
        notifications.push({
          message: data.message,
          facility: data.facility,
          time: new Date().toLocaleTimeString() // or use a library for better formatting
        });

        // Save updated notifications array to local storage
        localStorage.setItem('notifications', JSON.stringify(notifications));

        // Update the dropdown menu and notification count
        updateNotificationDropdown(notifications);
      });

      // Load notifications from local storage on page load
      const notifications = JSON.parse(localStorage.getItem('notifications')) || [];
      updateNotificationDropdown(notifications);
    });

    function updateNotificationDropdown(notifications) {
      const notificationsDropdown = document.querySelector('.notifications');
      const footer = notificationsDropdown.querySelector('.dropdown-footer');

      // Clear existing notifications
      notificationsDropdown.querySelectorAll('.notification-item').forEach(item => item.remove());

      // Add notifications to dropdown
      notifications.forEach((notification, index) => {
        const notificationItem = document.createElement('li');
        notificationItem.classList.add('notification-item');
        notificationItem.innerHTML = `
            <i class="bi bi-exclamation-circle text-warning"></i>
            <div>
                <h4>New Facility Added</h4>
                <p>${notification.message} <strong>${notification.facility}</strong></p>
                <p>${notification.time}</p>
            </div>
            <button class="notification-delete" data-index="${index}">&times;</button>
        `;
        notificationsDropdown.insertBefore(notificationItem, footer);
      });

      // Update notification count in the dropdown header
      const header = notificationsDropdown.querySelector('.dropdown-header');
      header.innerHTML = `You have ${notifications.length} new notifications <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>`;

      // Update notification count badge (assuming you have an element with id 'notification-count' for this purpose)
      const notificationCountBadge = document.getElementById('notification-count');
      if (notificationCountBadge) {
        notificationCountBadge.textContent = notifications.length;
      }

      // Add event listeners for delete buttons
      document.querySelectorAll('.notification-delete').forEach(button => {
        button.addEventListener('click', function() {
          const index = this.getAttribute('data-index');
          deleteNotification(index);
        });
      });
    }

    function deleteNotification(index) {
      // Retrieve notifications from local storage
      const notifications = JSON.parse(localStorage.getItem('notifications')) || [];

      // Remove the notification at the specified index
      notifications.splice(index, 1);

      // Save updated notifications array to local storage
      localStorage.setItem('notifications', JSON.stringify(notifications));

      // Update the dropdown menu and notification count
      updateNotificationDropdown(notifications);
    }
  </script>

</body>

</html>