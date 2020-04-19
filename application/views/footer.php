</div>
</div>
</body>
<script src="<?= base_url('assets/js/jquery-3.4.1.slim.min.js') ?>"></script>
<script src="<?= base_url('assets/js/popper.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
<script>
	$(document).ready( function () {
        $('#table_id').DataTable({"autoWidth": true});
} );
</script>
<style type="text/css">
	.pull-right{
		float: right;
		margin-right: 10px;
	}
</style>
</html>