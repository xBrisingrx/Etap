    </main>
	  <!-- JS Global Compulsory -->
	  <script src="<?php echo base_url('assets/vendor/jquery-migrate/jquery-migrate.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendor/popper.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendor/bootstrap/bootstrap.min.js');?>"></script>
    <!-- JS Implementing Plugins -->
    <script src="<?php echo base_url('assets/vendor/hs-megamenu/src/hs.megamenu.js');?>"></script>
    <script src="<?php echo base_url('assets/vendor/noty/noty.min.js');?>"></script>
	  <!-- JS Unify -->
    <script src="<?php echo base_url('assets/js/hs.core.js');?>"></script>
    <script src="<?php echo base_url('assets/js/components/hs.header.js');?>"></script>
    <script src="<?php echo base_url('assets/js/helpers/hs.hamburgers.js');?>"></script>
    <script src="<?php echo base_url('assets/js/components/hs.datepicker.js');?>"></script>
    <!-- datatables -->
    <script type="text/javascript" src="<?php echo base_url('assets/vendor/datatables/datatables.min.js');?>"></script>
    <!-- select2 -->
    <script type="text/javascript" src="<?php echo base_url('assets/vendor/select2/select2.full.min.js');?>"></script>

    <!-- Jquery validate -->
    <script src="<?php echo base_url('assets/vendor/jquery-validation/jquery.validate.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendor/jquery-validation/additional-methods.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendor/jquery-validation/messages_es_AR.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/custom.js');?>"></script>

    <script>
      const base_url = "<?php echo base_url('');?>"
      $(document).on('ready', function () {
        // initialization of header
        $.HSCore.components.HSHeader.init($('#js-header'));
        $.HSCore.helpers.HSHamburgers.init('.hamburger');

        $('.js-mega-menu').HSMegaMenu({
         event: 'hover',
         pageContainer: $('.container'),
         breakpoint: 991
        });
      });
    </script>
	</body>
</html>