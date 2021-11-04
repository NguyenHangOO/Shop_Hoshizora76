<div class="card">
	<h4 class="card-header">Lỗi</h4>
	<div class="card-body">
		<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
			<i class="fad fa-exclamation-triangle"></i> <?php echo $error_message; ?> <a href="#back" onclick="history.go(-1); return false;">Quay lại trang trước</a>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	</div>
</div>