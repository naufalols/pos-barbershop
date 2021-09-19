  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('asset/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('asset/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('asset/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('asset/'); ?>js/sb-admin-2.min.js"></script>
  <script src="<?= base_url('asset/vendor/'); ?>Semantic-UI/semantic.js"></script>
  <script src="<?= base_url('asset/vendor/'); ?>Semantic-UI-Calendar/dist/calendar.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src=" <?= base_url('asset/vendor/'); ?>DataTables/datatables.min.js"> </script>

  <!-- moment untuk ganti date string -->
  <script src="<?= base_url('asset/'); ?>js/moment-locales.js"></script>

  <script>
  	$(document).ready(function() {
  		$('[data-toggle="tooltip"]').tooltip();
  	});
  </script>
  <script>
  	function tambahkancukur(tambah_url, id) {
  		var url = tambah_url;
  		// console.log(url);
  		document.getElementById('tambahkan' + id).setAttribute("href", url);
  		document.getElementById('tambahkan' + id).focus();

  	};
  </script>
  <script>
  	function tambahkanmenu(tambah_url, id) {
  		var url = tambah_url;
  		// console.log(url);

  		document.getElementById('menu' + id).setAttribute("href", url);
  		document.getElementById('menu' + id).focus();
  	};
  </script>
  <script>
  	function confirm_modal(delete_url, title) {
  		var c = title;
  		jQuery("#modalhapus .menu").text(title);
  		$('.modalhapus').modal('show');
  		document.getElementById('delete_link_m_n').setAttribute("href", delete_url);
  		document.getElementById('delete_link_m_n').focus();
  		console.log(c);

  	};
  </script>
  <script>
  	function proses(url, title) {
  		var c = title;
  		var d = $('#tk_cukur').text();
  		$('#tkcukur').text(d);
  		jQuery("#selesaikanModal .nota").text(c);
  		$('.selesaikanModal').modal('show');
  		document.getElementById('proses').setAttribute("href", url);
  		console.log(c);

  	};
  </script>
  <script>
  	$(".close.icon").click(function() {
  		$(this).parent().hide();
  	});
  </script>
  <script>
  	function example(delete_url, title) {
  		jQuery("#example #delete").text(title);
  		$('.ui.modal').modal('show');
  		document.getElementById('delete').setAttribute("href", delete_url);

  	}
  </script>
  <script>
  	function shake() {
  		$('#tk_cukur')
  			.transition('shake');
  	}
  </script>
  <script>
  	$('#rangestart').calendar({
  		type: 'date',
		endCalendar: $('#rangeend'),
		formatter: {
					 date: function (date, settings) {
							if (!date) return '';
							var day = date.getDate() + '';
							if (day.length < 2) {
								day = '0' + day;
							}
							var month = (date.getMonth() + 1) + '';
							if (month.length < 2) {
								month = '0' + month;
							}
							var year = date.getFullYear();
							return year + '/' + month + '/' + day;
						}
					}
  	});
  	$('#rangeend').calendar({
  		type: 'date',
		  startCalendar: $('#rangestart'),
		  formatter: {
					 date: function (date, settings) {
							if (!date) return '';
							var day = date.getDate() + '';
							if (day.length < 2) {
								day = '0' + day;
							}
							var month = (date.getMonth() + 1) + '';
							if (month.length < 2) {
								month = '0' + month;
							}
							var year = date.getFullYear();
							return year + '/' + month + '/' + day;
						}
					}
  	});
  </script>

  </body>

  </html>