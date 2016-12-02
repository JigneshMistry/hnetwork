<?php $this->load->view('admin/includes/admin_header'); ?>
<div class="wrapper">
      <!-- Main Header -->
	  <?php $this->load->view('_layouts/navbar'); ?>
      <?php $this->load->view('_layouts/left-sidebar'); ?>
	  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <?php $this->load->view('_layouts/breadcrumb'); ?>
        <!-- Main content -->
        <section class="content">
          <!-- Your Page Content Here -->
				<?php $this->load->view($main_content); ?>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	  <?php $this->load->view('_layouts/footer'); ?>
	  <?php $this->load->view('_layouts/right-sidebar'); ?>
        <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
<?php $this->load->view('admin/includes/admin_footer'); ?>
    

   