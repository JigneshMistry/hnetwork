<!-- Main Footer -->
	<footer class="main-footer">
       <!-- To the right -->
        <div class="pull-right hidden-xs">
          <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="#">Hnetwork</a>.</strong> All rights reserved.
        </div>
        <!-- Default to the left -->
		Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
        
      </footer>